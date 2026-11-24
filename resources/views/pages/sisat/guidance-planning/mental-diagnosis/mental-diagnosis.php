<?php

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public int $employeesDiagnose = 0;

    public Company $company;

    public SisatModule $module;

    public SisatActivity $activity;

    public function mount(SisatModule $module, SisatActivity $activity, Company $company)
    {
        $this->module = $module;
        $this->company = $company;
        $this->activity = $activity;

        $this->calculateEmployeesDiagnose();
    }

    #[On('upload-document')]
    public function uploadDocument()
    {
        $this->calculateEmployeesDiagnose();
    }

    private function calculateEmployeesDiagnose()
    {
        $this->employeesDiagnose = $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->count();
    }
};
