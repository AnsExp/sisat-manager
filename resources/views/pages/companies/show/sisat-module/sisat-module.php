<?php

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Modules\ActivityCalculator;
use App\Modules\ModuleChecker;
use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatModule $module;

    public bool $open = false;

    public Collection $activities;

    public function mount(Company $company, SisatModule $module)
    {
        $this->company = $company;
        $this->module = $module;
        $this->init();
    }

    private function init()
    {
        $this->activities = ModuleChecker::activitiesForModule($this->company, $this->module);
    }

    public function toggle()
    {
        $this->open = ! $this->open;
    }

    public function progress(SisatActivity $activity)
    {
        $progress = ActivityCalculator::calculate($this->company, $activity) * 100;

        return $progress;
    }
};
