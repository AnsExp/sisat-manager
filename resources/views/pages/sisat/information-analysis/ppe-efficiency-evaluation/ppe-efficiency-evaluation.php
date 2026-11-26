<?php

use App\Enums\PpeEfficiencyEvaluationStep;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Evaluación y control de la eficacia de los equipos de protección personal y
 * colectiva (literal 2.1.b). El usuario arma la lista de ítems de protección y
 * cada ítem avanza por: requerido en matriz → eficacia evaluada → entregado a
 * expuestos → vigente.
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
     * Paso actual de cada ítem de la lista (null si aún no tiene pasos marcados).
     *
     * @return Collection<int, PpeEfficiencyEvaluationStep|null>
     */
    #[Computed]
    public function itemSteps()
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->pluck('results')
            ->filter(fn ($results) => isset($results['item']['name']))
            ->map(fn ($results) => PpeEfficiencyEvaluationStep::tryFrom($results['status'] ?? ''))
            ->values();
    }

    /**
     * Cuántos ítems alcanzaron cada paso, de forma acumulada: un ítem vigente
     * cuenta también en los pasos anteriores. % vigentes = vigentes ÷ ítems.
     *
     * @return array<string, int> ['required' => n, 'evaluated' => n, 'delivered' => n, 'current' => n]
     */
    #[Computed]
    public function stepTotals(): array
    {
        $totals = [];

        foreach (PpeEfficiencyEvaluationStep::cases() as $step) {
            $totals[$step->value] = $this->itemSteps
                ->filter(fn ($current) => $current?->hasReached($step))
                ->count();
        }

        return $totals;
    }

    #[On('ppe-items-updated')]
    public function reloadTotals(): void
    {
        unset($this->itemSteps, $this->stepTotals);
    }
};
