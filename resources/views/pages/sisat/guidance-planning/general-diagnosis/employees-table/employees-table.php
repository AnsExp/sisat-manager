<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public Company $company;

    public string $filter = 'all';

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function updatedFilter()
    {
        $this->resetPage();
    }

    #[On('upload-document')]
    public function uploadDocument() {}

    #[Computed]
    public function data()
    {
        $query = $this->company
            ->employees()
            ->orderBy('first_name');

        if ($this->filter === 'all') {
            return $query->paginate(10);
        }

        $results = SisatActivity::findBySlug('general_diagnosis')
            ?->results()
            ->where('company_id', $this->company->id);

        $diagnosedEmployeeIds = $results
            ? $results->get()->pluck('results.employee.id')->filter()->unique()
            : collect();

        if ($this->filter === 'diagnosis') {
            $query->whereIn('id', $diagnosedEmployeeIds);
        } elseif ($this->filter === 'without_diagnosis' || $this->filter === 'whitout_diagnosis') {
            $query->whereNotIn('id', $diagnosedEmployeeIds);
        }

        return $query->paginate(10);
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
