<?php

use App\Enums\WorkIncidentStatus;
use App\Enums\WorkIncidentType;
use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

/**
 * Modal para registrar un caso nuevo. El caso nace en la primera etapa
 * (registrado) con su timestamp en results.stages.registered.
 */
new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public ?string $workIncident = null;

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
            'workIncident' => ['required', Rule::enum(WorkIncidentType::class)],
            'date' => ['required', 'date', 'before_or_equal:today'],
            'employeeId' => ['required', Rule::exists('employees', 'id')->where('company_id', $this->company->id)],
            'description' => ['nullable', 'string'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $this->activity->results()->create([
            'company_id' => $this->company->id,
            'results' => [
                'work_incident' => $this->workIncident,
                'employee' => [
                    'id' => $this->employeeId,
                ],
                'date' => $this->date,
                'description' => $this->description,
                'status' => WorkIncidentStatus::REGISTERED->value,
                'stages' => [
                    WorkIncidentStatus::REGISTERED->value => [
                        'at' => now()->toIso8601String(),
                        'user_id' => auth()->id(),
                    ],
                ],
            ],
        ]);

        $this->reset(['workIncident', 'employeeId', 'date', 'description']);
        $this->dispatch('incidents-updated');

        Flux::modal('incident-store')->close();
        Flux::toast('Se ha registrado un nuevo incidente');
    }
};
