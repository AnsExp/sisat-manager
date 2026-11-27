<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public Company $company;

    public SisatActivity $activity;

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    #[Computed]
    public function data()
    {
        return $this->company
            ->employees()
            ->orderBy('first_name')
            ->paginate(10);
    }
};
