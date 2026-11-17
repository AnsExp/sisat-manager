<?php

use App\Models\Company;
use App\Models\Position;
use App\Models\Workspace;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;

    public Company $company;
    public Workspace|null $workspace = null;
    public Position|null $position = null;

    public function mount(Company $company, Workspace|null $workspace = null, Position|null $position = null)
    {
        $this->company = $company;
        $this->workspace = $workspace;
        $this->position = $position;
    }

    #[Computed]
    public function employees()
    {
        if ($this->workspace === null)
            return $this->company->employees()->orderBy('first_name')->paginate(10);
        if ($this->position === null)
            return $this->workspace->employees()->orderBy('first_name')->paginate(10);
        return $this->position->employees()->orderBy('first_name')->paginate(10);
    }

    public function render()
    {
        return $this->view()->title($this->company->name);
    }
};