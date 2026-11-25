<?php

use App\Enums\WorkIncidentStatus;
use App\Models\Company;
use App\Models\IloItem;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Revisión de los datos disponibles de enfermedades profesionales y accidentes (1.e).
 * Tablero de casos por etapa: registrado → clasificado → analizado.
 */
new class extends Component
{
    public Collection $items;

    public Company $company;

    public SisatModule $module;

    public SisatActivity $activity;

    public function mount(SisatModule $module, SisatActivity $activity, Company $company)
    {
        $this->module = $module;
        $this->company = $company;
        $this->activity = $activity;

        $this->items = IloItem::where('parent_id', null)->get();
    }

    /**
     * Cuántos casos alcanzaron cada etapa, de forma acumulada: un caso analizado
     * cuenta también como registrado y clasificado. Es la base para ponderar el
     * cumplimiento (por ejemplo, % analizados = analizados ÷ registrados).
     *
     * @return array<string, int> ['registered' => n, 'classified' => n, 'analyzed' => n]
     */
    #[Computed]
    public function stageTotals(): array
    {
        $currentStages = $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->pluck('results')
            ->map(fn ($results) => WorkIncidentStatus::tryFrom($results['status'] ?? ''))
            ->filter();

        $totals = [];

        foreach (WorkIncidentStatus::cases() as $stage) {
            $totals[$stage->value] = $currentStages->filter(fn ($current) => $current->hasReached($stage))->count();
        }

        return $totals;
    }

    #[On('incidents-updated')]
    public function reloadTotals(): void
    {
        unset($this->stageTotals);
    }
};
