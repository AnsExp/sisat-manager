<?php

use App\Models\Company;
use App\Models\Position;
use Flux\Flux;
use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component
{
    public string $name = '';

    public int $workspace_id = 0;

    public Company $company;

    public Collection $workspaces;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->workspaces = $this->company->workspaces()->orderBy('name')->get();
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'workspace_id' => ['required', 'exists:workspaces,id'],
        ];
    }

    public function submit()
    {
        $this->validate();
        Position::create([
            'name' => $this->name,
            'workspace_id' => $this->workspace_id,
        ]);
        $this->reset();
        Flux::modal('form-position')->close();
        $this->dispatch('reload-workspaces');
    }
};
