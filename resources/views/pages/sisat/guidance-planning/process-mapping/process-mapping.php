<?php

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatResult;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public $processes;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->processes = SisatActivity::findBySlug('process_mapping')
            ->results()
            ->where('company_id', $company->id)
            ->orderBy('results->label')
            ->get();
    }

    #[On('processes-update')]
    public function processUpdate()
    {
        $this->processes = SisatActivity::findBySlug('process_mapping')
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
