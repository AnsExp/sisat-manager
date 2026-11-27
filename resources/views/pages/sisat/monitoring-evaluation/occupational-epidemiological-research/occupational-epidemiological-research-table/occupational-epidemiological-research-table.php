<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

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
    #[On('occupational-epidemiological-research-update')]
    public function data()
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
};
