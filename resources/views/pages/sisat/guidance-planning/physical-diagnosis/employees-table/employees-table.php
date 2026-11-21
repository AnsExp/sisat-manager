<?php

use App\Models\Company;
use App\Models\Employee;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public Company $company;

    public Employee $currentEmployee;

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
    public function uploadDocument() {
    }

    #[Computed]
    public function data()
    {
        return $this->company
            ->employees()
            ->orderBy('first_name')
            ->paginate(10);
    }

    public function modalGenerate(int $employeeId) {
        $this->currentEmployee = Employee::find($employeeId);
        Flux::modal('generate-occupational-certificate')->show();
    }

    public function modalUpdate(int $employeeId) {
        $this->currentEmployee = Employee::find($employeeId);
        Flux::modal('upload-certificate')->show();
    }
};
