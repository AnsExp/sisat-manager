@use('App\Enums\PpeEfficiencyEvaluationStep')

@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatModule $module
     * @var App\Models\SisatActivity $activity
     */
    $totals = $this->stepTotals;
    $items = $this->itemSteps->count();
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />

    <div class="flex flex-wrap items-center justify-between gap-4">
        <flux:modal.trigger name="ppe-item-store">
            <flux:button size="sm" variant="primary">Agregar EPP</flux:button>
        </flux:modal.trigger>

        {{-- Ítems que alcanzaron cada paso (acumulado) sobre el total de ítems --}}
        <div class="flex flex-wrap gap-6 text-sm">
            <div>
                <span class="text-zinc-500 dark:text-zinc-400">Ítems</span>
                <span class="font-semibold">{{ $items }}</span>
            </div>
            @foreach (PpeEfficiencyEvaluationStep::cases() as $step)
                <div>
                    <span class="text-zinc-500 dark:text-zinc-400">{{ $step->pluralLabel() }}</span>
                    <span class="font-semibold">{{ $totals[$step->value] }}</span>
                    @if ($items > 0)
                        <span class="text-xs text-zinc-500">({{ round($totals[$step->value] / $items * 100) }} %)</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <livewire:pages::sisat.information-analysis.ppe-efficiency-evaluation.ppe-items-table :company="$company"
        :activity="$activity" />

    {{-- Modales --}}
    <livewire:pages::sisat.information-analysis.ppe-efficiency-evaluation.ppe-item-store :company="$company"
        :activity="$activity" />
</div>
