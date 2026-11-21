<?php

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatModule $module;

    public SisatActivity $activity;

    public function mount(SisatModule $module, SisatActivity $activity, Company $company)
    {
        $this->module = $module;
        $this->company = $company;
        $this->activity = $activity;
    }
};
