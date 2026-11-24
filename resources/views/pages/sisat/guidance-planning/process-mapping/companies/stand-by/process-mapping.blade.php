@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <flux:modal.trigger name="process-store">
        <flux:button variant="primary">
            Agregar procedimiento
        </flux:button>
    </flux:modal.trigger>
    <livewire:pages::sisat.guidance-planning.process-mapping.processes-table :company="$company" :activity="$activity" />
    <livewire:pages::sisat.guidance-planning.process-mapping.process-store :company="$company" :activity="$activity" />
</div>