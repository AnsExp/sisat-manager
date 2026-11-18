@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div>
    <flux:modal name="process-store">
        <form class="space-y-3" wire:submit.prevent="submit">
            <flux:input label="Nombre del proceso" wire:model="name"></flux:input>
            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>