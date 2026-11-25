<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * Tabla de puestos agrupados por área, una fila por puesto.
 */
new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    #[Computed]
    public function workspaces()
    {
        return $this->company
            ->workspaces()
            ->with(['positions' => fn ($query) => $query->orderBy('name')])
            ->orderBy('name')
            ->get();
    }
};
