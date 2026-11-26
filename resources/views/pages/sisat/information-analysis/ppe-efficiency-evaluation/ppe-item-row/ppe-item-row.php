<?php

use App\Enums\PpeEfficiencyEvaluationStep;
use App\Models\SisatResult;
use Carbon\CarbonInterface;
use Flux\Flux;
use Livewire\Component;

/**
 * Fila de un ítem de protección (2.1.b). Guarda los pasos en su propio registro:
 *
 *   results = [
 *     'item'   => ['name' => …],
 *     'status' => último paso alcanzado | null,
 *     'stages' => ['required' => ['at' => ISO8601, 'user_id' => …], …],
 *   ]
 *
 * Los pasos se marcan en orden y se desmarcan desde el último, así el registro
 * nunca tiene un paso sin los anteriores.
 */
new class extends Component
{
    public SisatResult $item;

    /** @var array<string, bool> Casillas marcadas, por valor de PpeEfficiencyEvaluationStep. */
    public array $checked = [];

    public function mount(SisatResult $item)
    {
        $this->item = $item;

        $this->syncChecked();
    }

    /**
     * Livewire lo llama al cambiar cualquier casilla (wire:model.live="checked.{paso}").
     */
    public function updatedChecked(bool $value, string $key): void
    {
        $step = PpeEfficiencyEvaluationStep::from($key);

        if (! $this->canToggle($step)) {
            $this->syncChecked();
            Flux::toast(variant: 'warning', text: 'Los pasos se marcan en orden y se desmarcan desde el último.');

            return;
        }

        $results = $this->item->results;

        if ($value) {
            $results['stages'][$step->value] = ['at' => now()->toIso8601String(), 'user_id' => auth()->id()];
            $results['status'] = $step->value;
        } else {
            unset($results['stages'][$step->value]);
            $results['status'] = $step->previous()?->value;
        }

        $this->item->results = $results;
        $this->item->save();

        $this->syncChecked();
        $this->dispatch('ppe-items-updated');
    }

    /**
     * Un paso se puede cambiar si el anterior está marcado y el siguiente no.
     */
    public function canToggle(PpeEfficiencyEvaluationStep $step): bool
    {
        $previous = $step->previous();
        $next = $step->next();

        return ($previous === null || $this->isReached($previous))
            && ($next === null || ! $this->isReached($next));
    }

    public function reachedAt(PpeEfficiencyEvaluationStep $step): ?CarbonInterface
    {
        return $this->item->stageAt($step->value);
    }

    public function remove(): void
    {
        $this->item->delete();

        $this->dispatch('ppe-items-updated');
        Flux::toast(text: 'Ítem eliminado de la lista.');
    }

    private function isReached(PpeEfficiencyEvaluationStep $step): bool
    {
        $current = PpeEfficiencyEvaluationStep::tryFrom($this->item->results['status'] ?? '');

        return $current?->hasReached($step) ?? false;
    }

    private function syncChecked(): void
    {
        foreach (PpeEfficiencyEvaluationStep::cases() as $step) {
            $this->checked[$step->value] = $this->isReached($step);
        }
    }
};
