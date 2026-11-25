<?php

use App\Enums\ManagementPlanningStatus;
use App\Enums\ManagementPlanningType;
use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

/**
 * Modal para solicitar un cambio nuevo. El cambio nace en la primera etapa
 * (solicitado) con su timestamp en results.stages.requested.
 */
new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public ?string $changeType = null;

    public ?int $employeeId = null;

    public ?string $date = null;

    public ?string $description = null;

    public function mount(SisatActivity $activity, Company $company)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    protected function rules()
    {
        return [
            'changeType' => ['required', Rule::enum(ManagementPlanningType::class)],
            'employeeId' => ['required', Rule::exists('employees', 'id')->where('company_id', $this->company->id)],
            'date' => ['required', 'date', 'before_or_equal:today'],
            'description' => ['nullable', 'string'],
        ];
    }

    protected function validationAttributes()
    {
        return [
            'changeType' => 'tipo de cambio',
            'employeeId' => 'trabajador',
            'date' => 'fecha',
            'description' => 'descripción',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $firstStage = ManagementPlanningStatus::REQUESTED;

        $this->activity->results()->create([
            'company_id' => $this->company->id,
            'results' => [
                'management_planning' => $this->changeType,
                'employee' => ['id' => $this->employeeId],
                'date' => $this->date,
                'description' => $this->description,
                'status' => $firstStage->value,
                'stages' => [
                    $firstStage->value => [
                        'at' => now()->toIso8601String(),
                        'user_id' => auth()->id(),
                    ],
                ],
            ],
        ]);

        $this->reset(['changeType', 'employeeId', 'date', 'description']);
        $this->dispatch('changes-updated');

        Flux::modal('change-store')->close();
        Flux::toast('Se ha registrado un nuevo cambio.');
    }
};
