<?php

use App\Enums\ManagementPlanningStatus;
use App\Enums\ManagementPlanningType;
use App\Enums\RiskLevel;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\Employee;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\SisatResult;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    Storage::fake('local');

    $ciiu = CIIU::forceCreate(['code' => 'C2511.01', 'description' => 'Fabricación de estructuras metálicas', 'level' => RiskLevel::HIGH]);

    $this->company = Company::forceCreate([
        'name' => 'Acme Corp',
        'slug' => 'acme-corp',
        'ruc' => '0991234567001',
        'ciiu_id' => $ciiu->id,
    ]);

    $this->employee = Employee::forceCreate([
        'first_name' => 'Juan',
        'last_name' => 'Pérez',
        'id_card' => '1712345678',
        'birthday' => '1990-01-01',
        'company_id' => $this->company->id,
    ]);

    $module = SisatModule::forceCreate(['name' => '1. Orientación y Planificación', 'slug' => 'guidance_planning']);

    $this->activity = SisatActivity::forceCreate([
        'sisat_module_id' => $module->id,
        'name' => 'Planificación de la gestión preventiva',
        'slug' => 'management_planning',
        'responsable' => 'security_monitor',
        'rules' => [],
    ]);

    $this->actingAs(User::factory()->create());
});

const MANAGEMENT_PLANNING = 'pages::sisat.guidance-planning.management-planning';

function requestChange(): SisatResult
{
    Livewire::test(MANAGEMENT_PLANNING.'.change-store', [
        'company' => test()->company,
        'activity' => test()->activity,
    ])
        ->set('changeType', ManagementPlanningType::NEW_MACHINE->value)
        ->set('employeeId', test()->employee->id)
        ->set('date', now()->subDays(3)->toDateString())
        ->set('description', 'Prensa hidráulica nueva')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('changes-updated');

    return SisatResult::latest('id')->first();
}

function advanceChange(SisatResult $change, string $details, ?UploadedFile $document = null)
{
    return Livewire::test(MANAGEMENT_PLANNING.'.change-advance-form', ['company' => test()->company])
        ->call('open', $change->id)
        ->set('date', now()->toDateString())
        ->set('details', $details)
        ->set('document', $document)
        ->call('submit');
}

function changeColumn(ManagementPlanningStatus $stage)
{
    return Livewire::test(MANAGEMENT_PLANNING.'.change-stage-column', [
        'company' => test()->company,
        'activity' => test()->activity,
        'status' => $stage->value,
    ]);
}

test('requesting a change stores the requested stage with its timestamp', function () {
    $change = requestChange();

    expect($change->results['status'])->toBe('requested')
        ->and($change->results['management_planning'])->toBe('new_machine')
        ->and($change->stageAt('requested'))->not->toBeNull()
        ->and($change->stage('evaluated'))->toBeNull();
});

test('the request form can register several changes in a row', function () {
    $form = Livewire::test(MANAGEMENT_PLANNING.'.change-store', [
        'company' => $this->company,
        'activity' => $this->activity,
    ]);

    foreach (['Prensa nueva', 'Turno nocturno'] as $description) {
        $form->set('changeType', ManagementPlanningType::NEW_WORK_METHOD->value)
            ->set('employeeId', $this->employee->id)
            ->set('date', now()->toDateString())
            ->set('description', $description)
            ->call('submit')
            ->assertHasNoErrors();
    }

    expect(SisatResult::count())->toBe(2);
});

test('a change goes through every stage keeping each one', function () {
    $change = requestChange();

    advanceChange($change, 'Ruido de 95 dB y riesgo de atrapamiento')->assertHasNoErrors();
    advanceChange($change->fresh(), 'Encapsulado acústico y guardas')->assertHasNoErrors();
    advanceChange($change->fresh(), 'Inicio autorizado', UploadedFile::fake()->create('acta.pdf', 20, 'application/pdf'))
        ->assertHasNoErrors()
        ->assertDispatched('changes-updated');

    $change->refresh();

    expect($change->results['status'])->toBe('authorized')
        ->and($change->results['description'])->toBe('Prensa hidráulica nueva')
        ->and($change->stage('evaluated')['details'])->toBe('Ruido de 95 dB y riesgo de atrapamiento')
        ->and($change->stage('measures_defined')['details'])->toBe('Encapsulado acústico y guardas')
        ->and($change->stage('authorized')['document']['name'])->toBe('acta.pdf');

    foreach (ManagementPlanningStatus::cases() as $stage) {
        expect($change->stageAt($stage->value))->not->toBeNull();
    }

    Storage::disk('local')->assertExists($change->stage('authorized')['document']['path']);
});

test('an authorized change cannot move further', function () {
    $change = requestChange();

    foreach (range(1, 3) as $step) {
        advanceChange($change->fresh(), "Etapa {$step}");
    }

    Livewire::test(MANAGEMENT_PLANNING.'.change-advance-form', ['company' => $this->company])
        ->call('open', $change->id)
        ->assertSet('to', null);
});

test('a stale form does not overwrite a stage already recorded', function () {
    $change = requestChange();

    $stale = Livewire::test(MANAGEMENT_PLANNING.'.change-advance-form', ['company' => $this->company])
        ->call('open', $change->id)
        ->set('details', 'Segunda evaluación');

    advanceChange($change, 'Primera evaluación');

    $stale->call('submit');

    expect($change->fresh()->stage('evaluated')['details'])->toBe('Primera evaluación');
});

test('each column shows 5 changes per page, most recently requested first', function () {
    $ids = [];

    foreach (range(1, 7) as $minute) {
        $this->travel(1)->minutes();
        $ids[] = requestChange()->id;
    }

    $newestFirst = array_reverse($ids);
    $column = changeColumn(ManagementPlanningStatus::REQUESTED);

    expect($column->get('changes')->pluck('id')->all())->toBe(array_slice($newestFirst, 0, 5));

    $column->call('setPage', 2, 'page-requested');

    expect($column->get('changes')->pluck('id')->all())->toBe(array_slice($newestFirst, 5));
});

test('the board counts accumulated changes per stage', function () {
    $first = requestChange();
    requestChange();
    advanceChange($first, 'Evaluación');

    Livewire::test(MANAGEMENT_PLANNING, [
        'module' => $this->activity->module,
        'activity' => $this->activity,
        'company' => $this->company,
    ])->assertSet('stageTotals', [
        'requested' => 2,
        'evaluated' => 1,
        'measures_defined' => 0,
        'authorized' => 0,
    ]);
});
