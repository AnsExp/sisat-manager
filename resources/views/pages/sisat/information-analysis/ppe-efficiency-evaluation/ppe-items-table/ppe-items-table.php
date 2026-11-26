<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Tabla de ítems de protección de la empresa, una fila por ítem.
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
    public function items()
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->get()
            ->filter(fn ($item) => isset($item->results['item']['name']))
            ->sortBy(fn ($item) => mb_strtolower($item->results['item']['name']))
            ->values();
    }

    #[On('ppe-items-updated')]
    public function reloadItems(): void
    {
        unset($this->items);
    }
};
