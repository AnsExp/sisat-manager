<?php

use App\Models\CompanyProcess;
use Flux\Flux;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public int $companyId = 0;

    public ?int $processId = null;

    public ?string $name = null;

    #[On('load-process')]
    public function loadProcess(int $companyId, ?int $processId = null)
    {
        $this->companyId = $companyId;
        $this->processId = $processId;
        $this->name = $processId ? CompanyProcess::find($processId)?->name : null;

        Flux::modal('process-store')->show();
    }

    public function submit()
    {
        CompanyProcess::create([
            'company_id' => $this->companyId,
            'name' => $this->name,
        ]);
        $this->dispatch('processes-update');
        Flux::modal('process-store')->close();
    }
};
