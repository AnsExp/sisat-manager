<?php

use App\Models\Company;
use App\Models\SisatModule;
use App\Modules\ActivityCalculator;
use App\Modules\ModuleChecker;
use Illuminate\Support\Collection;
use Livewire\Component;

new class extends Component
{
    public Collection $modules;

    public Company $company;

    public float $progress = 0;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->modules = SisatModule::all();
        $this->init();
    }

    private function init()
    {
        $progressAccumulated = 0;
        $countAccumulated = 0;
        foreach ($this->modules as $module) {
            foreach (ModuleChecker::activitiesForModule($this->company, $module) as $activity) {
                $progressAccumulated += ActivityCalculator::calculate($this->company, $activity);
                $countAccumulated++;
            }
        }
        $this->progress += ($progressAccumulated / $countAccumulated) * 100;
    }

    public function render()
    {
        return $this->view()->title($this->company->name);
    }
};
