<?php

use App\Enums\RiskLevel;
use App\Enums\WorkIncidentStatus;
use App\Enums\WorkIncidentType;
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
        'name' => 'Revisión de los datos disponibles de enfermedades profesionales y accidentes',
        'slug' => 'data_review',
        'responsable' => 'profesional_medical',
        'rules' => [],
    ]);

    $this->actingAs(User::factory()->create());
});

function registerIncident(): SisatResult
{
    Livewire::test('pages::sisat.guidance-planning.data-review.incident-store', [
        'company' => test()->company,
        'activity' => test()->activity,
    ])
        ->set('workIncident', WorkIncidentType::WORK_ACCIDENT->value)
        ->set('employeeId', test()->employee->id)
        ->set('date', now()->subDays(3)->toDateString())
        ->set('description', 'Caída en el andamio')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('incidents-updated');

    return SisatResult::latest('id')->first();
}

function advanceIncident(SisatResult $result, string $details, ?UploadedFile $document = null)
{
    return Livewire::test('pages::sisat.guidance-planning.data-review.incident-advance-form', ['company' => test()->company])
        ->call('open', $result->id)
        ->set('date', now()->toDateString())
        ->set('details', $details)
        ->set('document', $document)
        ->call('submit');
}

test('registering an incident stores the registered stage with its timestamp', function () {
    $result = registerIncident();

    expect($result->results['status'])->toBe(WorkIncidentStatus::REGISTERED->value)
        ->and($result->stageAt('registered'))->not->toBeNull()
        ->and($result->stage('classified'))->toBeNull();
});

test('an incident moves registered → classified → analyzed keeping every stage', function () {
    $result = registerIncident();

    advanceIncident($result, 'Caída a distinto nivel')
        ->assertHasNoErrors()
        ->assertDispatched('incidents-updated');

    advanceIncident($result->fresh(), 'Falta de línea de vida', UploadedFile::fake()->create('informe.pdf', 20, 'application/pdf'))
        ->assertHasNoErrors();

    $result->refresh();

    expect($result->results['status'])->toBe(WorkIncidentStatus::ANALYZED->value)
        ->and($result->results['description'])->toBe('Caída en el andamio')
        ->and($result->stageAt('registered'))->not->toBeNull()
        ->and($result->stage('classified')['details'])->toBe('Caída a distinto nivel')
        ->and($result->stage('classified')['document'])->toBeNull()
        ->and($result->stageAt('classified'))->not->toBeNull()
        ->and($result->stage('analyzed')['details'])->toBe('Falta de línea de vida')
        ->and($result->stageAt('analyzed'))->not->toBeNull();

    $document = $result->stage('analyzed')['document'];

    expect($document['name'])->toBe('informe.pdf')
        ->and($document['sha256'])->toHaveLength(64);

    Storage::disk('local')->assertExists($document['path']);
});

test('an analyzed incident cannot move further', function () {
    $result = registerIncident();
    advanceIncident($result, 'Clasificación');
    advanceIncident($result->fresh(), 'Análisis');

    Livewire::test('pages::sisat.guidance-planning.data-review.incident-advance-form', ['company' => $this->company])
        ->call('open', $result->id)
        ->assertSet('to', null);
});

test('a stale form does not overwrite a stage already recorded', function () {
    $result = registerIncident();

    $stale = Livewire::test('pages::sisat.guidance-planning.data-review.incident-advance-form', ['company' => $this->company])
        ->call('open', $result->id)
        ->set('details', 'Segunda clasificación');

    advanceIncident($result, 'Primera clasificación');

    $stale->call('submit');

    expect($result->fresh()->stage('classified')['details'])->toBe('Primera clasificación');
});

test('the stage date cannot be before the incident date', function () {
    $result = registerIncident();

    Livewire::test('pages::sisat.guidance-planning.data-review.incident-advance-form', ['company' => $this->company])
        ->call('open', $result->id)
        ->set('date', now()->subYear()->toDateString())
        ->set('details', 'Clasificación')
        ->call('submit')
        ->assertHasErrors(['date']);
});

test('the board counts accumulated cases per stage', function () {
    $first = registerIncident();
    registerIncident();
    advanceIncident($first, 'Clasificación');

    Livewire::test('pages::sisat.guidance-planning.data-review', [
        'module' => $this->activity->module,
        'activity' => $this->activity,
        'company' => $this->company,
    ])->assertSet('stageTotals', [
        'registered' => 2,
        'classified' => 1,
        'analyzed' => 0,
    ]);
});

function stageColumn(string $status)
{
    return Livewire::test('pages::sisat.guidance-planning.data-review.incident-stage-column', [
        'company' => test()->company,
        'activity' => test()->activity,
        'status' => $status,
    ]);
}

test('each column shows 5 cases per page, most recently registered first', function () {
    $ids = [];

    foreach (range(1, 7) as $minute) {
        $this->travel(1)->minutes();
        $ids[] = registerIncident()->id;
    }

    $newestFirst = array_reverse($ids);

    $column = stageColumn('registered');

    expect($column->get('incidents')->pluck('id')->all())->toBe(array_slice($newestFirst, 0, 5))
        ->and($column->get('incidents')->total())->toBe(7);

    $column->call('setPage', 2, 'page-registered');

    expect($column->get('incidents')->pluck('id')->all())->toBe(array_slice($newestFirst, 5));
});

test('moving a case to another stage does not change the order of the rest', function () {
    $ids = [];

    foreach (range(1, 3) as $minute) {
        $this->travel(1)->minutes();
        $ids[] = registerIncident()->id;
    }

    // El caso más antiguo es el último en moverse: aun así queda al fondo en su nueva columna.
    advanceIncident(SisatResult::find($ids[2]), 'Clasificación');
    advanceIncident(SisatResult::find($ids[0]), 'Clasificación');

    expect(stageColumn('classified')->get('incidents')->pluck('id')->all())->toBe([$ids[2], $ids[0]])
        ->and(stageColumn('registered')->get('incidents')->pluck('id')->all())->toBe([$ids[1]]);
});

test('a column returns to the last page with cases when its page empties', function () {
    foreach (range(1, 6) as $minute) {
        $this->travel(1)->minutes();
        registerIncident();
    }

    $column = stageColumn('registered')->call('setPage', 2, 'page-registered');
    $oldest = $column->get('incidents')->first();

    advanceIncident($oldest, 'Clasificación');

    $column->dispatch('incidents-updated');

    expect($column->get('incidents')->currentPage())->toBe(1)
        ->and($column->get('incidents')->count())->toBe(5);
});
