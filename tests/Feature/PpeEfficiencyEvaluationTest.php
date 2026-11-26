<?php

use App\Enums\RiskLevel;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\SisatResult;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $ciiu = CIIU::forceCreate(['code' => 'C2511.01', 'description' => 'Fabricación de estructuras metálicas', 'level' => RiskLevel::HIGH]);

    $this->company = Company::forceCreate([
        'name' => 'Acme Corp',
        'slug' => 'acme-corp',
        'ruc' => '0991234567001',
        'ciiu_id' => $ciiu->id,
    ]);

    $module = SisatModule::forceCreate(['name' => '2. Análisis y Recopilación de Información', 'slug' => 'information_analysis']);

    $this->activity = SisatActivity::forceCreate([
        'sisat_module_id' => $module->id,
        'name' => 'Evaluación de la eficacia de los EPP',
        'slug' => 'ppe_efficiency_evaluation',
        'responsable' => 'security_monitor',
        'rules' => [],
    ]);

    $this->actingAs(User::factory()->create());
});

const PPE_EFFICIENCY = 'pages::sisat.information-analysis.ppe-efficiency-evaluation';

function addPpeItem(string $name): SisatResult
{
    Livewire::test(PPE_EFFICIENCY.'.ppe-item-store', [
        'company' => test()->company,
        'activity' => test()->activity,
    ])
        ->set('name', $name)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('ppe-items-updated');

    return SisatResult::latest('id')->first();
}

function ppeItemRow(SisatResult $item)
{
    return Livewire::test(PPE_EFFICIENCY.'.ppe-item-row', ['item' => $item]);
}

test('adding an item creates one record with no steps yet', function () {
    $item = addPpeItem('Protector auditivo');

    expect($item->results)->toBe([
        'item' => ['name' => 'Protector auditivo'],
        'status' => null,
        'stages' => [],
    ]);
});

test('an item cannot be listed twice', function () {
    addPpeItem('Protector auditivo');

    Livewire::test(PPE_EFFICIENCY.'.ppe-item-store', ['company' => $this->company, 'activity' => $this->activity])
        ->set('name', ' protector AUDITIVO ')
        ->call('submit')
        ->assertHasErrors('name');

    expect(SisatResult::count())->toBe(1);
});

test('marking the steps in order keeps them in the same record with each timestamp', function () {
    $item = addPpeItem('Guantes anticorte');
    $row = ppeItemRow($item);

    foreach (['required', 'evaluated', 'delivered', 'current'] as $step) {
        $row->set("checked.{$step}", true)->assertDispatched('ppe-items-updated');
    }

    $item->refresh();

    expect(SisatResult::count())->toBe(1)
        ->and($item->results['status'])->toBe('current')
        ->and($item->stageAt('required'))->not->toBeNull()
        ->and($item->stageAt('current'))->not->toBeNull();
});

test('steps are marked in order and unmarked from the last one', function () {
    $item = addPpeItem('Gafas de seguridad');

    ppeItemRow($item)
        ->set('checked.evaluated', true)
        ->assertSet('checked.evaluated', false)
        ->set('checked.required', true)
        ->set('checked.evaluated', true)
        ->set('checked.required', false)
        ->assertSet('checked.required', true)
        ->set('checked.evaluated', false);

    expect($item->fresh()->results['status'])->toBe('required')
        ->and($item->fresh()->stage('evaluated'))->toBeNull();
});

test('an item can be removed from the list', function () {
    $item = addPpeItem('Respirador media cara');

    ppeItemRow($item)->call('remove')->assertDispatched('ppe-items-updated');

    expect(SisatResult::count())->toBe(0);
});

test('the page counts accumulated items per step over all items', function () {
    $done = addPpeItem('Calzado de seguridad');
    addPpeItem('Extracción localizada');

    $row = ppeItemRow($done);
    foreach (['required', 'evaluated', 'delivered', 'current'] as $step) {
        $row->set("checked.{$step}", true);
    }

    Livewire::test(PPE_EFFICIENCY, [
        'module' => $this->activity->module,
        'activity' => $this->activity,
        'company' => $this->company,
    ])
        ->assertSet('stepTotals', ['required' => 1, 'evaluated' => 1, 'delivered' => 1, 'current' => 1])
        ->assertSee('Calzado de seguridad')
        ->assertSee('Extracción localizada')
        ->assertSee('(50 %)', false);
});
