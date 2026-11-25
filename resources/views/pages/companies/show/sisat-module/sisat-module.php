<?php

use App\Models\Company;
use App\Models\SisatModule;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatModule $module;

    public bool $open = false;

    public function mount(Company $company, SisatModule $module)
    {
        $this->company = $company;
        $this->module = $module;
    }

    public function toggle()
    {
        $this->open = ! $this->open;
    }
};
