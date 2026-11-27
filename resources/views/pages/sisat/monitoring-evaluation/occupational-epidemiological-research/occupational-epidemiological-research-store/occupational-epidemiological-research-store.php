<?php

use App\Enums\OccupationalEpidemiologicalResearchStatus;
use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public string $activityName = '';

    public string $month = '';

    public int $called = 0;

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    protected function rules()
    {
        return [
            'activityName' => ['required', 'string', 'min:3'],
            'called' => ['required', 'numeric', 'min:1'],
            'month' => ['required', 'date'],
        ];
    }

    public function submit()
    {
        $this->validate();

        DB::transaction(function () {
            $this->activity->results()->create([
                'company_id' => $this->company->id,
                'results' => [
                    'activity' => $this->activityName,
                    'month' => $this->month,
                    'called' => (int) $this->called,
                    'participants' => null,
                    'date_execution' => null,
                    'evidence' => [],
                    'status' => OccupationalEpidemiologicalResearchStatus::PROGRAMMED->value,
                ],
            ]);
            $this->resetExcept('activity', 'company');
            $this->dispatch('occupational-epidemiological-research-update');
            Flux::toast('Se guardo una nueva actividad');
            Flux::modal('occupational-epidemiological-research-store')->close();
        });

    }
};
