<?php

use App\Enums\VerificationOutcome;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Support\ControlSystemSchedule;
use Flux\Flux;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * Evaluación y seguimiento de los sistemas de control diseñados para eliminar o
 * reducir la exposición a riesgos laborales (literal 2.1.c).
 *
 * El usuario registra los sistemas de control (ventilación, guardas, aislamiento…)
 * con su frecuencia de verificación. El cronograma anual muestra en qué meses toca
 * verificar cada uno y permite registrar cada verificación con su resultado.
 * Cada sistema es un único registro (ver ControlSystemSchedule).
 */
new class extends Component
{
    public Company $company;

    public SisatModule $module;

    public SisatActivity $activity;

    /** Año que muestra el cronograma. */
    public int $year;

    public function mount(SisatModule $module, SisatActivity $activity, Company $company)
    {
        $this->module = $module;
        $this->company = $company;
        $this->activity = $activity;
        $this->year = now()->year;
    }

    /**
     * @return Collection<int, ControlSystemSchedule>
     */
    #[Computed]
    public function systems(): Collection
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->get()
            ->filter(fn ($result) => isset($result->results['system']['name']))
            ->sortBy(fn ($result) => mb_strtolower($result->results['system']['name']))
            ->map(fn ($result) => new ControlSystemSchedule($result))
            ->values();
    }

    /**
     * Indicadores del año mostrado:
     *  - 2.1.c.1: verificaciones ejecutadas ÷ verificaciones exigibles a la fecha.
     *  - 2.1.c.2: sistemas cuya última verificación fue conforme ÷ sistemas verificados.
     *
     * @return array{systems: int, executed: int, due: int, verified: int, effective: int}
     */
    #[Computed]
    public function totals(): array
    {
        $executed = 0;
        $due = 0;

        foreach ($this->systems as $system) {
            $compliance = $system->compliance($this->year);
            $executed += $compliance['executed'];
            $due += $compliance['due'];
        }

        $outcomes = $this->systems->map->latestOutcome()->filter();

        return [
            'systems' => $this->systems->count(),
            'executed' => $executed,
            'due' => $due,
            'verified' => $outcomes->count(),
            'effective' => $outcomes->filter(fn ($outcome) => $outcome === VerificationOutcome::CONFORMING)->count(),
        ];
    }

    public function previousYear(): void
    {
        $this->year--;
    }

    public function nextYear(): void
    {
        $this->year++;
    }

    public function removeSystem(int $id): void
    {
        $this->activity->results()->where('company_id', $this->company->id)->whereKey($id)->delete();

        $this->reloadSystems();
        Flux::toast(text: 'Sistema de control eliminado.');
    }

    #[On('control-systems-updated')]
    public function reloadSystems(): void
    {
        unset($this->systems, $this->totals);
    }
};
