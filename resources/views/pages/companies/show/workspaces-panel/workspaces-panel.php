<?php

use App\Models\Company;
use App\Models\Position;
use App\Models\Workspace;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {

    public Company $company;
    public Workspace|null $workspace = null;
    public Position|null $position = null;

    public function mount(Company $company, Workspace|null $workspace = null, Position|null $position = null)
    {
        $this->company = $company;
        $this->workspace = $workspace;
        $this->position = $position;
    }

    #[On('reload-workspaces')]
    public function reloadWorkspacesPanel()
    {
    }
};