<?php

use App\Models\Company;
use App\Models\SisatModule;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

new class extends Component
{
    public Collection $modules;

    public Company $company;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->modules = SisatModule::all();
    }

    public function render()
    {
        return $this->view()->title($this->company->name);
    }
};
