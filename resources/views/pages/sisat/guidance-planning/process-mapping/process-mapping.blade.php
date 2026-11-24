@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatActivity $activity
     * @var App\Models\SisatModule $module
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <flux:modal.trigger name="process-store">
        <flux:button size="sm" variant="primary">
            Agregar procedimiento
        </flux:button>
    </flux:modal.trigger>
    <livewire:pages::sisat.guidance-planning.process-mapping.processes-table :company="$company" :activity="$activity" />
    <livewire:pages::sisat.guidance-planning.process-mapping.process-store :company="$company" :activity="$activity" />
    <livewire:pages::sisat.guidance-planning.process-mapping.document-store :activity="$activity" />
</div>