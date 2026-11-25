@use('App\Enums\ManagementPlanningStatus')

@php
    /**
     * @var App\Models\Company $company
     */
    $totals = $this->stageTotals;
    $requested = $totals[ManagementPlanningStatus::REQUESTED->value];
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />

    <div class="flex flex-wrap items-center justify-between gap-4">
        <flux:modal.trigger name="change-store">
            <flux:button variant="primary" size="sm">Registrar cambio</flux:button>
        </flux:modal.trigger>

        {{-- Cambios que alcanzaron cada etapa (acumulado) --}}
        <div class="flex flex-wrap gap-6 text-sm">
            @foreach (ManagementPlanningStatus::cases() as $stage)
                <div>
                    <span class="text-zinc-500 dark:text-zinc-400">{{ $stage->pluralLabel() }}</span>
                    <span class="font-semibold">{{ $totals[$stage->value] }}</span>
                    @if (! $stage->isFirst() && $requested > 0)
                        <span class="text-xs text-zinc-500">({{ round($totals[$stage->value] / $requested * 100) }} %)</span>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    {{-- Una columna por etapa --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-2">
        @foreach (ManagementPlanningStatus::cases() as $stage)
            <livewire:pages::sisat.guidance-planning.management-planning.change-stage-column :company="$company"
                :activity="$activity" :status="$stage->value" :key="'change-stage-column-' . $stage->value" />
        @endforeach
    </div>

    {{-- Modales --}}
    <livewire:pages::sisat.guidance-planning.management-planning.change-store :company="$company" :activity="$activity" />
    <livewire:pages::sisat.guidance-planning.management-planning.change-advance-form :company="$company" />
</div>
