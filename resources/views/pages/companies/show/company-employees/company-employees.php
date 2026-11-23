<?php

use App\Models\Company;
use App\Models\SisatModule;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public Collection $modules;

    public Company $company;

    public string $delimitFilter = '';

    public int $delimitValue = 0;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->modules = SisatModule::all();
    }

    #[On('delimit-data')]
    public function delimitData(string $filter, int $value)
    {
        $this->delimitFilter = $filter;
        $this->delimitValue = $value;
    }

    #[Computed]
    public function employees()
    {
        $query = $this->company->employees()->getQuery();
        $query->orderBy('first_name');

        if ($this->delimitFilter === 'position') {
            $query->where('position_id', $this->delimitValue);
        } elseif ($this->delimitFilter === 'workspace') {
            $query->where('workspace_id', $this->delimitValue);
        }

        return $query->paginate(10);
    }
};
