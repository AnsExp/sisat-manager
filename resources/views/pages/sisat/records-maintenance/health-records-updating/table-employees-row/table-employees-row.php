<?php

use App\Enums\HealthRecordsUpdatingStatus;
use App\Models\Employee;
use App\Models\SisatActivity;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public Employee $employee;

    public SisatActivity $activity;

    public string $evaluations = '';

    public string $exams = '';

    public string $status = '';

    public function mount(SisatActivity $activity, Employee $employee)
    {
        $this->activity = $activity;
        $this->employee = $employee;
        $this->init();
    }

    #[On('record-update-{employee.id}')]
    public function init()
    {
        $resultRecord = $this->activity
            ->results()
            ->where('company_id', $this->employee->company->id)
            ->where('results->employee->id', $this->employee->id)
            ->first();

        if ($resultRecord === null) {
            $this->evaluations = HealthRecordsUpdatingStatus::MISSING->label();
            $this->exams = HealthRecordsUpdatingStatus::MISSING->label();
            $this->status = HealthRecordsUpdatingStatus::MISSING->label();

            return;
        }

        $this->evaluations = HealthRecordsUpdatingStatus::from($resultRecord->results['evaluations'])->label();
        $this->exams = HealthRecordsUpdatingStatus::from($resultRecord->results['exams'])->label();
        $this->status = HealthRecordsUpdatingStatus::from($resultRecord->results['result'])->label();
    }
};
