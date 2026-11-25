<?php

use App\Enums\ManagementPlanningStatus;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Planificación de la gestión preventiva respecto a los riesgos a la salud
 * asociados al inicio de actividades (literal 1.f): gestión del cambio.
 * Tablero de cambios por etapa: solicitado → evaluado → medidas definidas → autorizado.
 */
new class extends Component
{
    public Company $company;

    public SisatModule $module;

    public SisatActivity $activity;

    public function mount(SisatModule $module, SisatActivity $activity, Company $company)
    {
        $this->module = $module;
        $this->company = $company;
        $this->activity = $activity;
    }

    /**
     * Cuántos cambios alcanzaron cada etapa, de forma acumulada: un cambio
     * autorizado cuenta también en las etapas anteriores. Es la base para ponderar
     * el cumplimiento (por ejemplo, % autorizados = autorizados ÷ solicitados).
     *
     * @return array<string, int> ['requested' => n, 'evaluated' => n, 'measures_defined' => n, 'authorized' => n]
     */
    #[Computed]
    public function stageTotals(): array
    {
        $currentStages = $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->pluck('results')
            ->map(fn ($results) => ManagementPlanningStatus::tryFrom($results['status'] ?? ''))
            ->filter();

        $totals = [];

        foreach (ManagementPlanningStatus::cases() as $stage) {
            $totals[$stage->value] = $currentStages->filter(fn ($current) => $current->hasReached($stage))->count();
        }

        return $totals;
    }

    #[On('changes-updated')]
    public function reloadTotals(): void
    {
        unset($this->stageTotals);
    }
};
