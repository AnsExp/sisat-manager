<?php

use App\Models\Company;
use App\Models\SisatResult;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public $processes;

    public $sample;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->sample = config('oit_list');
    }

    public function toggleProcess(int $processId, bool $checked)
    {
        // $process = SisatResult::find($processId);
        // $results = $process->results;
        // $results['checked'] = $checked;
        // $process->results = $results;
        // $process->save();
    }
};
