<?php

use App\Enums\RiskLevel;
use App\Enums\WorkStaff;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Position;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\SisatResult;
use App\Models\Workspace;
use Livewire\Livewire;

beforeEach(function () {
    $this->ciiu = new CIIU;
    $this->ciiu->code = 'A0111';
    $this->ciiu->description = 'Cultivo de cereales';
    $this->ciiu->level = RiskLevel::LOW;
    $this->ciiu->save();

    $this->company = Company::create([
        'name' => 'Acme Corp',
        'ruc' => '20123456789',
        'address' => 'Av. Principal 123',
        'email' => 'contact@acme.com',
        'ciiu_id' => $this->ciiu->id,
    ]);

    $this->workspace = Workspace::create([
        'name' => 'Planta',
        'company_id' => $this->company->id,
    ]);

    $this->position = Position::create([
        'name' => 'Operario',
        'workspace_id' => $this->workspace->id,
    ]);

    $this->module = SisatModule::create([
        'name' => 'Guidance and Planning',
        'slug' => 'guidance_planning',
    ]);

    $this->activity = new SisatActivity;
    $this->activity->sisat_module_id = $this->module->id;
    $this->activity->name = 'Diagnóstico General';
    $this->activity->slug = 'general_diagnosis';
    $this->activity->responsable = WorkStaff::PROFESSIONAL_MEDICAL;
    $this->activity->rules = [];
    $this->activity->save();

    $this->employee1 = Employee::create([
        'first_name' => 'Alice',
        'last_name' => 'Smith',
        'id_card' => '11111111',
        'company_id' => $this->company->id,
        'workspace_id' => $this->workspace->id,
        'position_id' => $this->position->id,
    ]);

    $this->employee2 = Employee::create([
        'first_name' => 'Bob',
        'last_name' => 'Jones',
        'id_card' => '22222222',
        'company_id' => $this->company->id,
        'workspace_id' => $this->workspace->id,
        'position_id' => $this->position->id,
    ]);

    $this->employee3 = Employee::create([
        'first_name' => 'Charlie',
        'last_name' => 'Brown',
        'id_card' => '33333333',
        'company_id' => $this->company->id,
        'workspace_id' => $this->workspace->id,
        'position_id' => $this->position->id,
    ]);

    SisatResult::create([
        'company_id' => $this->company->id,
        'sisat_activity_id' => $this->activity->id,
        'results' => [
            'path' => 'guidance_planning/general_diagnosis/sample1.pdf',
            'employee' => [
                'id' => $this->employee1->id,
            ],
        ],
    ]);
});

test('it returns all employees when filter is all', function () {
    Livewire::test('pages::companies.sisat.guidance-planning.general-diagnosis.employees-table', ['company' => $this->company])
        ->set('filter', 'all')
        ->assertSee('Alice')
        ->assertSee('Bob')
        ->assertSee('Charlie');
});

test('it returns only diagnosed employees when filter is diagnosis', function () {
    Livewire::test('pages::companies.sisat.guidance-planning.general-diagnosis.employees-table', ['company' => $this->company])
        ->set('filter', 'diagnosis')
        ->assertSee('Alice')
        ->assertDontSee('Bob')
        ->assertDontSee('Charlie');
});

test('it returns only undiagnosed employees when filter is without_diagnosis', function () {
    Livewire::test('pages::companies.sisat.guidance-planning.general-diagnosis.employees-table', ['company' => $this->company])
        ->set('filter', 'without_diagnosis')
        ->assertDontSee('Alice')
        ->assertSee('Bob')
        ->assertSee('Charlie');
});

test('it returns only undiagnosed employees when filter is whitout_diagnosis fallback', function () {
    Livewire::test('pages::companies.sisat.guidance-planning.general-diagnosis.employees-table', ['company' => $this->company])
        ->set('filter', 'whitout_diagnosis')
        ->assertDontSee('Alice')
        ->assertSee('Bob')
        ->assertSee('Charlie');
});

test('it scopes results to the given company', function () {
    $otherCompany = Company::create([
        'name' => 'Other Corp',
        'ruc' => '20999999999',
        'address' => 'Av. Otra 456',
        'email' => 'other@corp.com',
        'ciiu_id' => $this->ciiu->id,
    ]);

    $otherEmployee = Employee::create([
        'first_name' => 'David',
        'last_name' => 'Miller',
        'id_card' => '44444444',
        'company_id' => $otherCompany->id,
        'workspace_id' => $this->workspace->id,
        'position_id' => $this->position->id,
    ]);

    SisatResult::create([
        'company_id' => $otherCompany->id,
        'sisat_activity_id' => $this->activity->id,
        'results' => [
            'path' => 'guidance_planning/general_diagnosis/other.pdf',
            'employee' => [
                'id' => $otherEmployee->id,
            ],
        ],
    ]);

    Livewire::test('pages::companies.sisat.guidance-planning.general-diagnosis.employees-table', ['company' => $this->company])
        ->set('filter', 'diagnosis')
        ->assertSee('Alice')
        ->assertDontSee('David');
});

test('employeeHasDocument checks whether employee has diagnosis document', function () {
    $component = Livewire::test('pages::companies.sisat.guidance-planning.general-diagnosis.employees-table', ['company' => $this->company]);

    expect($component->instance()->employeeHasDocument($this->employee1->id))->toBeTrue();
    expect($component->instance()->employeeHasDocument($this->employee2->id))->toBeFalse();
});
