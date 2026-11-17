<?php

use App\Models\Workspace;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {

    public string $name = '';
    public int $companyId;
    public int|null $workspaceId;

    #[On('form-workspace')]
    public function formWorkspace(int $companyId, int|null $workspaceId = null)
    {
        $this->companyId = $companyId;
        $this->workspaceId = $workspaceId;
        if ($workspaceId) {
            $this->name = Workspace::find($workspaceId)->name;
        }
        Flux::modal('form-workspace')->show();
    }

    public function submit()
    {
        Workspace::updateOrCreate([
            'id' => $this->workspaceId ?? 0
        ], [
            'name' => $this->name,
            'company_id' => $this->companyId,
        ]);
        $this->name = '';
        Flux::modal('form-workspace')->close();
        $this->dispatch('reload-workspaces');
    }
};