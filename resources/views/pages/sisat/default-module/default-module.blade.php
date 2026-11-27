@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <flux:modal.trigger name="document-store">
        <flux:button variant="primary">Subir Documento</flux:button>
    </flux:modal.trigger>
    <livewire:pages::sisat.default-module.document-store :company="$company" :activity="$activity" />
    <livewire:pages::sisat.default-module.documents-table :company="$company" :activity="$activity" />
    <flux:text>Actividad por defecto</flux:text>
</div>