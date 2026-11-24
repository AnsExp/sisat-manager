<?php

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\SisatResult;
use App\Modules\ActivityCalculator;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public $processes;

    public Company $company;

    public SisatModule $module;

    public SisatActivity $activity;

    public float $percentageCompleted = 0.0;

    public function mount(SisatModule $module, SisatActivity $activity, Company $company)
    {
        $this->module = $module;
        $this->company = $company;
        $this->activity = $activity;

        $this->processUpdate();

        $this->percentageCompleted = ActivityCalculator::calculate($company, $activity);

    }

    #[On('processes-update')]
    public function processUpdate()
    {
        $this->processes = $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->orderBy('results->label')
            ->get();
    }

    public function toggleProcess(int $processId, bool $checked)
    {
        $process = SisatResult::find($processId);
        $results = $process->results;
        $results['checked'] = $checked;
        $process->results = $results;
        $process->save();
    }
};
