@use('App\Enums\WorkIncidentStatus')

@php
    /**
     * @var App\Models\Company $company
     * @var Illuminate\Database\Eloquent\Collection<int,App\Models\IloItem> $items
     */
    $totals = $this->stageTotals;
    $registered = $totals[WorkIncidentStatus::REGISTERED->value];
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />

    <div class="flex flex-wrap items-center justify-between gap-4">
        <flux:modal.trigger name="incident-store">
            <flux:button variant="primary" size="sm">Subir Caso</flux:button>
        </flux:modal.trigger>

        {{-- Casos que alcanzaron cada etapa (acumulado) --}}
        <div class="flex flex-wrap gap-6 text-sm">
            @foreach (WorkIncidentStatus::cases() as $stage)
                <div>
                    <span class="text-zinc-500 dark:text-zinc-400">{{ $stage->label() }}s</span>
                    <span class="font-semibold">{{ $totals[$stage->value] }}</span>
                    @if ($stage !== WorkIncidentStatus::REGISTERED && $registered > 0)
                        <span class="text-xs text-zinc-500">({{ round($totals[$stage->value] / $registered * 100) }} %)</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    {{-- Una columna por etapa --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
        @foreach (WorkIncidentStatus::cases() as $stage)
            <livewire:pages::sisat.guidance-planning.data-review.incident-stage-column :company="$company"
                :activity="$activity" :status="$stage->value" :key="'incident-stage-column-' . $stage->value" />
        @endforeach
    </div>

    {{-- Modales --}}
    <livewire:pages::sisat.guidance-planning.data-review.incident-store :company="$company" :activity="$activity" />
    <livewire:pages::sisat.guidance-planning.data-review.incident-advance-form :company="$company" />
</div>
