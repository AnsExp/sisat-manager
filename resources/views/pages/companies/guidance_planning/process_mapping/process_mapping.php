<?php

use App\Models\Company;
use App\Models\CompanyProcess;
use App\Modules\ModuleChecker;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public $processes;

    public function mount(Company $company)
    {
        if (! ModuleChecker::companyHasActivity($company, 'guidance_planning', 'process_mapping')) {
            abort(403);
        }
        $this->company = $company;
        $this->processes = $company->processes()->orderBy('name')->get();
    }

    #[On('processes-update')]
    public function processUpdate()
    {
        $this->processes = $this->company->processes()->orderBy('name')->get();
    }

    public function toggleProcess(int $processId, bool $checked)
    {
        CompanyProcess::where('id', $processId)->update(['checked' => $checked]);
    }
};
