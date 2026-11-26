<?php

use App\Enums\PpeEfficiencyEvaluationStep;
use App\Models\Company;
use App\Models\Position;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Línea base de identificación de peligros, evaluación de riesgos y medidas de
 * control (literal 2.1.a). Cada puesto avanza por: peligros identificados →
 * riesgos evaluados → medidas definidas → vigente.
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
     * Total de puestos de la empresa: denominador del indicador 2.1.a.1.
     */
    #[Computed]
    public function totalPositions(): int
    {
        return Position::whereIn('workspace_id', $this->company->workspaces()->select('id'))->count();
    }

    /**
     * Cuántos puestos alcanzaron cada paso, de forma acumulada: un puesto vigente
     * cuenta también en los pasos anteriores. % vigente = vigentes ÷ total de puestos.
     *
     * @return array<string, int> ['identified' => n, 'evaluated' => n, 'controls_defined' => n, 'current' => n]
     */
    #[Computed]
    public function stepTotals(): array
    {
        $positionIds = Position::whereIn('workspace_id', $this->company->workspaces()->select('id'))->pluck('id');

        // Solo puestos que siguen existiendo en la empresa.
        $currentSteps = $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->pluck('results')
            ->filter(fn ($results) => $positionIds->contains($results['position']['id'] ?? null))
            ->map(fn ($results) => PpeEfficiencyEvaluationStep::tryFrom($results['status'] ?? ''))
            ->filter();

        $totals = [];

        foreach (PpeEfficiencyEvaluationStep::cases() as $step) {
            $totals[$step->value] = $currentSteps->filter(fn ($current) => $current->hasReached($step))->count();
        }

        return $totals;
    }

    #[On('baseline-updated')]
    public function reloadTotals(): void
    {
        unset($this->stepTotals);
    }
};
