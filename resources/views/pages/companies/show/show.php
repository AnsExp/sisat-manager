<?php

use App\Models\Company;
use App\Models\Position;
use App\Models\SisatModule;
use App\Models\Workspace;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public Collection $modules;

    public Company $company;

    public ?Workspace $workspace = null;

    public ?Position $position = null;

    public function mount(Company $company, ?Workspace $workspace = null, ?Position $position = null)
    {
        $this->company = $company;
        $this->workspace = $workspace;
        $this->position = $position;
        $this->modules = SisatModule::all();
    }

    #[Computed]
    public function employees()
    {
        if ($this->workspace === null) {
            return $this->company->employees()->orderBy('first_name')->paginate(10);
        }
        if ($this->position === null) {
            return $this->workspace->employees()->orderBy('first_name')->paginate(10);
        }

        return $this->position->employees()->orderBy('first_name')->paginate(10);
    }

    public function render()
    {
        return $this->view()->title($this->company->name);
    }
};
