<?php

use App\Enums\WorkIncidentStatus;
use App\Enums\WorkIncidentType;
use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public string $workIncident;

    public int $employeeId;

    public string $date;

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
            'date' => ['required', 'date'],
            'employeeId' => ['required', 'exists:employees,id'],
            'description' => ['nullable'],
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
            ],
        ]);

        Flux::modal('incident-store')->close();

        Flux::toast('Se ha registrado un nuevo incidente');
    }
};
