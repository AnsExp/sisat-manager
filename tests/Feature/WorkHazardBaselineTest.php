<?php

use App\Enums\RiskLevel;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\Position;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\SisatResult;
use App\Models\User;
use App\Models\Workspace;
use Livewire\Livewire;

beforeEach(function () {
    $ciiu = CIIU::forceCreate(['code' => 'C2511.01', 'description' => 'Fabricación de estructuras metálicas', 'level' => RiskLevel::HIGH]);

    $this->company = Company::forceCreate([
        'name' => 'Acme Corp',
        'slug' => 'acme-corp',
        'ruc' => '0991234567001',
        'ciiu_id' => $ciiu->id,
    ]);

    $workspace = Workspace::forceCreate(['name' => 'Producción', 'company_id' => $this->company->id]);
    $this->welder = Position::forceCreate(['name' => 'Soldador', 'workspace_id' => $workspace->id]);
    $this->driver = Position::forceCreate(['name' => 'Chofer', 'workspace_id' => $workspace->id]);

    $module = SisatModule::forceCreate(['name' => '2. Análisis y Recopilación de Información', 'slug' => 'information_analysis']);

    $this->activity = SisatActivity::forceCreate([
        'sisat_module_id' => $module->id,
        'name' => 'Línea base de peligros y riesgos',
        'slug' => 'work_hazard_baseline',
        'responsable' => 'security_monitor',
        'rules' => [],
    ]);

    $this->actingAs(User::factory()->create());
});

const WORK_HAZARD_BASELINE = 'pages::sisat.information-analysis.work-hazard-baseline';

function positionRow(Position $position)
{
    return Livewire::test(WORK_HAZARD_BASELINE.'.table-positions-row', [
        'company' => test()->company,
        'activity' => test()->activity,
        'position' => $position,
    ]);
}

function baselineOf(Position $position): ?SisatResult
{
    return SisatResult::where('results->position->id', $position->id)->first();
}

test('marking the steps in order keeps one record per position with each timestamp', function () {
    $row = positionRow($this->welder);

    foreach (['identified', 'evaluated', 'controls_defined', 'current'] as $step) {
        $row->set("checked.{$step}", true)->assertDispatched('baseline-updated');
    }

    $baseline = baselineOf($this->welder);

    expect(SisatResult::count())->toBe(1)
        ->and($baseline->results['status'])->toBe('current')
        ->and($baseline->stageAt('identified'))->not->toBeNull()
        ->and($baseline->stageAt('current'))->not->toBeNull();

    $row->assertSet('checked', [
        'identified' => true,
        'evaluated' => true,
        'controls_defined' => true,
        'current' => true,
    ]);
});

test('a step cannot be marked before the previous one', function () {
    positionRow($this->welder)
        ->set('checked.evaluated', true)
        ->assertSet('checked.evaluated', false)
        ->assertNotDispatched('baseline-updated');

    expect(baselineOf($this->welder))->toBeNull();
});

test('steps are unmarked from the last one', function () {
    $row = positionRow($this->welder)
        ->set('checked.identified', true)
        ->set('checked.evaluated', true);

    // No se puede desmarcar «identificados» mientras «evaluados» está marcado.
    $row->set('checked.identified', false)->assertSet('checked.identified', true);

    $row->set('checked.evaluated', false)->assertSet('checked.evaluated', false);

    $baseline = baselineOf($this->welder);

    expect($baseline->results['status'])->toBe('identified')
        ->and($baseline->stage('evaluated'))->toBeNull()
        ->and($baseline->stage('identified'))->not->toBeNull();
});

test('a reloaded row shows the saved steps', function () {
    positionRow($this->welder)->set('checked.identified', true);

    positionRow($this->welder)
        ->assertSet('checked.identified', true)
        ->assertSet('checked.evaluated', false);
});

test('the page counts accumulated positions per step over all positions', function () {
    $welder = positionRow($this->welder);
    foreach (['identified', 'evaluated', 'controls_defined', 'current'] as $step) {
        $welder->set("checked.{$step}", true);
    }
    positionRow($this->driver)->set('checked.identified', true);

    Livewire::test(WORK_HAZARD_BASELINE, [
        'module' => $this->activity->module,
        'activity' => $this->activity,
        'company' => $this->company,
    ])
        ->assertSet('totalPositions', 2)
        ->assertSet('stepTotals', [
            'identified' => 2,
            'evaluated' => 1,
            'controls_defined' => 1,
            'current' => 1,
        ])
        ->assertSee('Soldador')
        ->assertSee('Chofer');
});

test('the activity page renders the baseline table', function () {
    $this->get(route('sisat.activity', [$this->company, $this->activity->module, $this->activity]))
        ->assertOk()
        ->assertSee('Producción')
        ->assertSee('Soldador')
        ->assertSee('Con línea base vigente');
});
