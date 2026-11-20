<?php

use App\Enums\RiskLevel;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Workspace;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->ciiu = CIIU::create([
        'code' => 'A0111',
        'description' => 'Cultivo de cereales',
        'level' => RiskLevel::LOW,
    ]);

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

    $this->employee = Employee::create([
        'first_name' => 'Juan',
        'last_name' => 'Perez',
        'id_card' => '12345678',
        'workspace_id' => $this->workspace->id,
        'position_id' => $this->position->id,
        'company_id' => $this->company->id,
    ]);

    $this->user = User::factory()->create();
});

test('mental diagnosis page loads and renders employees table', function () {
    $this->actingAs($this->user)
        ->get(route('sisat.guidance-planning.mental-diagnosis', ['company' => $this->company]))
        ->assertOk()
        ->assertSee('Juan');
});
