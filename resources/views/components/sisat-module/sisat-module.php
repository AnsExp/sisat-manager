<?php

use App\Models\Company;
use App\Models\SisatModule;
use App\Modules\ModuleChecker;
use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatModule $module;

    public Collection $activities;

    public bool $open = false;

    public function mount(Company $company, SisatModule $module)
    {
        $this->company = $company;
        $this->module = $module;
        $this->initActivities();
    }

    private function initActivities()
    {
        $this->activities = collect();
        foreach ($this->module->activities as $activity) {
            if (ModuleChecker::checkActivity($this->company, $activity)) {
                $this->activities->push($activity);
            }
        }
    }

    public function toggle()
    {
        $this->open = ! $this->open;
    }
};
