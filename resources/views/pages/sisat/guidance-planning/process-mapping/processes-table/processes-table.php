<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
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

    #[On('processes-update')]
    public function proccessesUpdate() {}

    #[Computed]
    public function data()
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
};
