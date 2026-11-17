<?php

use App\Models\Position;
use App\Models\Workspace;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component {

    public string $name = '';
    public int $companyId;
    public int $workspaceId;
    public string $workspaceName;
    public int|null $positionId;

    #[On('form-position')]
    public function formPosition(int $companyId, int $workspaceId, int|null $positionId = null)
    {
        $this->companyId = $companyId;
        $this->workspaceId = $workspaceId;
        $this->positionId = $positionId;
        $this->workspaceName = Workspace::query()->select('name')->find($workspaceId)->name;
        if ($positionId) {
            $this->name = Position::find($positionId)?->name ?? '';
        }
        Flux::modal('form-position')->show();
    }

    public function submit()
    {
        Position::updateOrCreate([
            'id' => $this->positionId ?? 0,
        ], [
            'name' => $this->name,
            'workspace_id' => $this->workspaceId,
        ]);
        $this->name = '';
        Flux::modal('form-position')->close();
        $this->dispatch('reload-workspaces');
    }
};