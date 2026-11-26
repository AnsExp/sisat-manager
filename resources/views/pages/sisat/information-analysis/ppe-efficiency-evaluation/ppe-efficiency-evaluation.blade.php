@use('App\Enums\PpeEfficiencyEvaluationStep')

@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatModule $module
     * @var App\Models\SisatActivity $activity
     */
    $totals = $this->stepTotals;
    $positions = $this->totalPositions;
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />

    {{-- Puestos que alcanzaron cada paso (acumulado) sobre el total de puestos --}}
    <div class="flex flex-wrap gap-6 text-sm">
        <div>
            <span class="text-zinc-500 dark:text-zinc-400">Puestos</span>
            <span class="font-semibold">{{ $positions }}</span>
        </div>
        @foreach (PpeEfficiencyEvaluationStep::cases() as $step)
            <div>
                <span class="text-zinc-500 dark:text-zinc-400">{{ $step->pluralLabel() }}</span>
                <span class="font-semibold">{{ $totals[$step->value] }}</span>
                @if ($positions > 0)
                    <span class="text-xs text-zinc-500">({{ round($totals[$step->value] / $positions * 100) }} %)</span>
                @endif
            </div>
        @endforeach
    </div>

    <livewire:pages::sisat.information-analysis.ppe-efficiency-evaluation.table-positions :company="$company"
        :activity="$activity" />
</div>