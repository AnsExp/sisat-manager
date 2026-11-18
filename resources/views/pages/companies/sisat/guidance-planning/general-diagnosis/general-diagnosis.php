<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public int $employeesDiagnose = 0;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->calculateEmployeesDiagnose();
    }

    #[On("upload-document")]
    public function uploadDocument(){}

    private function calculateEmployeesDiagnose()
    {
        $this->employeesDiagnose = SisatActivity::findBySlug('general_diagnosis')
            ->results()
            ->where('company_id', $this->company->id)
            ->count();
    }
};
