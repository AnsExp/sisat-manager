<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public string $name = '';

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
        ];
    }

    public function submit()
    {
        $this->validate();

        DB::transaction(function () {
            $this->activity->results()->create([
                'company_id' => $this->company->id,
                'results' => [
                    'map' => [
                        'path' => null,
                        'sha256' => null,
                    ],
                    'name' => $this->name,
                ],
            ]);
            Flux::toast('Se guardo un nuevo proceso.');
            $this->dispatch('processes-update');
            Flux::modal('process-store')->close();
        });

    }
};
