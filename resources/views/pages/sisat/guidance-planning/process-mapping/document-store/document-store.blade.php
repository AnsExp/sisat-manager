@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatResult $result
     */
@endphp

<div>
    <flux:modal name="document-store">
        <form class="space-y-2" wire:submit.prevent="submit">
            <flux:input label="Nuevo mapa de proceso ({{ $result?->results['name'] }})." wire:model="document" type="file" accept="application/pdf"></flux:input>
            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>