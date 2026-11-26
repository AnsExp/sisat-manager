<?php

use App\Enums\RiskLevel;
use App\Enums\VerificationFrequency;
use App\Enums\VerificationState;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\SisatResult;
use App\Models\User;
use App\Support\ControlSystemSchedule;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    Storage::fake('local');
    $this->travelTo('2026-06-15 10:00:00');

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
        'name' => 'Seguimiento de los sistemas de control',
        'slug' => 'risk_control_systems_followup',
        'responsable' => 'security_monitor',
        'rules' => [],
    ]);

    $this->actingAs(User::factory()->create());
});

const RISK_CONTROL = 'pages::sisat.information-analysis.risk-control-systems-followup';

function addControlSystem(string $name, VerificationFrequency $frequency, string $start): SisatResult
{
    Livewire::test(RISK_CONTROL.'.control-system-store', [
        'company' => test()->company,
        'activity' => test()->activity,
    ])
        ->set('name', $name)
        ->set('frequency', $frequency->value)
        ->set('start', $start)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('control-systems-updated');

    return SisatResult::latest('id')->first();
}

function verifyControlSystem(SisatResult $system, string $month, string $outcome = 'conforming', ?string $findings = null)
{
    return Livewire::test(RISK_CONTROL.'.verification-form', [
        'company' => test()->company,
        'activity' => test()->activity,
    ])
        ->call('open', $system->id, $month)
        ->set('date', "{$month}-20")
        ->set('outcome', $outcome)
        ->set('findings', $findings)
        ->call('submit');
}

test('adding a control system creates one record with its schedule', function () {
    $system = addControlSystem('Extracción de humos', VerificationFrequency::QUARTERLY, '2026-01');

    expect($system->results)->toBe([
        'system' => ['name' => 'Extracción de humos', 'frequency' => 3, 'start' => '2026-01'],
        'verifications' => [],
    ]);
});

test('the schedule marks scheduled months by frequency and their state', function () {
    $schedule = new ControlSystemSchedule(addControlSystem('Guardas de prensas', VerificationFrequency::QUARTERLY, '2026-03'));

    expect($schedule->state('2026-01'))->toBe(VerificationState::NONE)
        ->and($schedule->state('2026-03'))->toBe(VerificationState::LATE)
        ->and($schedule->state('2026-06'))->toBe(VerificationState::DUE)
        ->and($schedule->state('2026-09'))->toBe(VerificationState::FUTURE)
        ->and($schedule->state('2027-03'))->toBe(VerificationState::FUTURE)
        ->and($schedule->state('2026-04'))->toBe(VerificationState::NONE);
});

test('a verification is stored inside the same record with its timestamp and evidence', function () {
    $system = addControlSystem('Cabina de pintura', VerificationFrequency::MONTHLY, '2026-05');

    Livewire::test(RISK_CONTROL.'.verification-form', ['company' => $this->company, 'activity' => $this->activity])
        ->call('open', $system->id, '2026-05')
        ->set('date', '2026-05-20')
        ->set('outcome', 'nonconforming')
        ->set('findings', 'Filtro saturado')
        ->set('document', UploadedFile::fake()->create('informe.pdf', 20, 'application/pdf'))
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('control-systems-updated');

    $verification = $system->fresh()->results['verifications']['2026-05'];

    expect(SisatResult::count())->toBe(1)
        ->and($verification['outcome'])->toBe('nonconforming')
        ->and($verification['findings'])->toBe('Filtro saturado')
        ->and($verification['at'])->not->toBeNull()
        ->and($verification['document']['name'])->toBe('informe.pdf');

    Storage::disk('local')->assertExists($verification['document']['path']);
});

test('nonconforming verifications need findings', function () {
    $system = addControlSystem('Cabina de pintura', VerificationFrequency::MONTHLY, '2026-05');

    verifyControlSystem($system, '2026-05', 'nonconforming')->assertHasErrors('findings');
});

test('future or unscheduled months cannot be registered', function () {
    $system = addControlSystem('Aislamiento acústico', VerificationFrequency::QUARTERLY, '2026-03');

    foreach (['2026-09', '2026-04'] as $month) {
        Livewire::test(RISK_CONTROL.'.verification-form', ['company' => $this->company, 'activity' => $this->activity])
            ->call('open', $system->id, $month)
            ->assertSet('system', null);
    }
});

test('a verification can be removed and the month is pending again', function () {
    $system = addControlSystem('Ventilación general', VerificationFrequency::MONTHLY, '2026-05');
    verifyControlSystem($system, '2026-05');

    Livewire::test(RISK_CONTROL.'.verification-form', ['company' => $this->company, 'activity' => $this->activity])
        ->call('open', $system->id, '2026-05')
        ->call('remove');

    expect((new ControlSystemSchedule($system->fresh()))->state('2026-05'))->toBe(VerificationState::LATE);
});

test('the page shows executed vs due verifications and effective systems', function () {
    // Trimestral desde enero: ene y abr exigibles (jun no lo es hasta julio).
    $fumes = addControlSystem('Extracción de humos', VerificationFrequency::QUARTERLY, '2026-01');
    // Mensual desde mayo: mayo exigible, junio en curso.
    $booth = addControlSystem('Cabina de pintura', VerificationFrequency::MONTHLY, '2026-05');

    verifyControlSystem($fumes, '2026-01');
    verifyControlSystem($fumes, '2026-04', 'nonconforming', 'Ducto roto');
    verifyControlSystem($booth, '2026-05');

    Livewire::test(RISK_CONTROL, [
        'module' => $this->activity->module,
        'activity' => $this->activity,
        'company' => $this->company,
    ])
        ->assertSet('totals', [
            'systems' => 2,
            'executed' => 3,
            'due' => 3,
            'verified' => 2,
            'effective' => 1,
        ])
        ->assertSee('Extracción de humos')
        ->assertSee('Cronograma 2026')
        ->call('previousYear')
        ->assertSee('Cronograma 2025')
        ->assertSet('totals.due', 0);
});
