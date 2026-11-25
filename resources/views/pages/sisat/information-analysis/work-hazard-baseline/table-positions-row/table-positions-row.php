<?php

use App\Enums\WorkHazardBaselineStep;
use App\Models\Company;
use App\Models\Position;
use App\Models\SisatActivity;
use App\Models\SisatResult;
use Carbon\CarbonInterface;
use Flux\Flux;
use Livewire\Component;

/**
 * Fila de un puesto en la línea base (2.1.a). Cada puesto tiene un único registro:
 *
 *   results = [
 *     'position' => ['id' => …],
 *     'status'   => último paso alcanzado | null,
 *     'stages'   => ['identified' => ['at' => ISO8601, 'user_id' => …], …],
 *   ]
 *
 * Los pasos se marcan en orden y se desmarcan desde el último, así el registro
 * nunca tiene un paso sin los anteriores.
 */
new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public Position $position;

    /** @var array<string, bool> Casillas marcadas, por valor de WorkHazardBaselineStep. */
    public array $checked = [];

    /** Registro del puesto, cargado una vez por petición (false = aún sin cargar). */
    private SisatResult|false|null $record = false;

    public function mount(Company $company, SisatActivity $activity, Position $position)
    {
        $this->company = $company;
        $this->activity = $activity;
        $this->position = $position;

        $this->syncChecked();
    }

    /**
     * Livewire lo llama al cambiar cualquier casilla (wire:model.live="checked.{paso}").
     */
    public function updatedChecked(bool $value, string $key): void
    {
        $step = WorkHazardBaselineStep::from($key);

        if (! $this->canToggle($step)) {
            $this->syncChecked();
            Flux::toast(variant: 'warning', text: 'Los pasos se marcan en orden y se desmarcan desde el último.');

            return;
        }

        $value ? $this->markStep($step) : $this->unmarkStep($step);

        $this->syncChecked();
        $this->dispatch('baseline-updated');
    }

    /**
     * Un paso se puede cambiar si el anterior está marcado y el siguiente no.
     */
    public function canToggle(WorkHazardBaselineStep $step): bool
    {
        $previous = $step->previous();
        $next = $step->next();

        return ($previous === null || $this->isReached($previous))
            && ($next === null || ! $this->isReached($next));
    }

    public function reachedAt(WorkHazardBaselineStep $step): ?CarbonInterface
    {
        return $this->result()?->stageAt($step->value);
    }

    private function markStep(WorkHazardBaselineStep $step): void
    {
        $result = $this->result() ?? new SisatResult([
            'company_id' => $this->company->id,
            'sisat_activity_id' => $this->activity->id,
            'results' => ['position' => ['id' => $this->position->id], 'status' => null, 'stages' => []],
        ]);

        $results = $result->results;
        $results['stages'][$step->value] = ['at' => now()->toIso8601String(), 'user_id' => auth()->id()];
        $results['status'] = $step->value;
        $result->results = $results;
        $result->save();

        $this->record = $result;
    }

    private function unmarkStep(WorkHazardBaselineStep $step): void
    {
        $result = $this->result();

        if (! $result) {
            return;
        }

        $results = $result->results;
        unset($results['stages'][$step->value]);
        $results['status'] = $step->previous()?->value;
        $result->results = $results;
        $result->save();
    }

    private function isReached(WorkHazardBaselineStep $step): bool
    {
        $current = WorkHazardBaselineStep::tryFrom($this->result()?->results['status'] ?? '');

        return $current?->hasReached($step) ?? false;
    }

    private function result(): ?SisatResult
    {
        if ($this->record === false) {
            $this->record = $this->activity
                ->results()
                ->where('company_id', $this->company->id)
                ->where('results->position->id', $this->position->id)
                ->first();
        }

        return $this->record;
    }

    private function syncChecked(): void
    {
        foreach (WorkHazardBaselineStep::cases() as $step) {
            $this->checked[$step->value] = $this->isReached($step);
        }
    }
};
