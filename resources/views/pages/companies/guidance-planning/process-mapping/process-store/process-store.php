<?php

use App\Models\SisatActivity;
use App\Models\SisatResult;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public int $companyId = 0;

    public ?int $resultId = null;

    public ?string $name = null;

    #[On('load-process')]
    public function loadProcess(int $companyId, ?int $resultId = null)
    {
        $this->companyId = $companyId;
        $this->resultId = $resultId;
        $this->name = $resultId ? SisatResult::find($resultId)?->results['label'] : null;

        Flux::modal('process-store')->show();
    }

    public function submit()
    {
        SisatActivity::findBySlug('process_mapping')->results()->create([
            'company_id' => $this->companyId,
            'results' => [
                'label' => $this->name,
                'checked' => false,
            ],
        ]);
        $this->dispatch('processes-update');
        Flux::modal('process-store')->close();
    }
};
