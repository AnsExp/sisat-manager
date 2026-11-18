<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public Company $company;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    #[Computed]
    public function data()
    {
        return $this->company->employees()->orderBy('first_name')->paginate(10);
    }

    public function employeeHasDocument(int $employeeId)
    {
        return SisatActivity::findBySlug('general_diagnosis')
            ->results()
            ->where('company_id', $this->company->id)
            ->where('results->employee->id', $employeeId)
            ->exists();
    }

    public function downloadDocument(int $employeeId)
    {
        Log::info($employeeId);
    }
};
