@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatModule $module
     * @var App\Models\SisatActivity $activity
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <div class="flex flex-wrap items-center justify-between gap-4">
        <flux:modal.trigger name="occupational-epidemiological-research-store">
            <flux:button size="sm" variant="primary" icon="plus">Programar actividad</flux:button>
        </flux:modal.trigger>
    </div>

    <livewire:pages::sisat.monitoring-evaluation.occupational-epidemiological-research.occupational-epidemiological-research-store
        :company="$company" :activity="$activity" />
</div>