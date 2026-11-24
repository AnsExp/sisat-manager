<?php

use App\Enums\WorkIncidentStatus;
use App\Models\Company;
use App\Models\Employee;
use App\Models\SisatActivity;
use App\Models\SisatResult;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public function mount(SisatActivity $activity, Company $company)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    #[Computed]
    public function data()
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->where('results->status', WorkIncidentStatus::REGISTERED->value)
            ->paginate(10);
    }

    public function employeeByResult(SisatResult $result)
    {
        return Employee::find($result->results['employee']['id']);
    }
};
