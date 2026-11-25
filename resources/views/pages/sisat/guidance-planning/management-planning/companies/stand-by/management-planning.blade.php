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
    <livewire:pages::sisat.guidance-planning.management-planning.document-store :company="$company" />
    <livewire:pages::sisat.guidance-planning.management-planning.documents-table :company="$company" />
</div>