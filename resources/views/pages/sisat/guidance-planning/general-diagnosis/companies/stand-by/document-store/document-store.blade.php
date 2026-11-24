@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div>
    <flux:modal name="document-store">
        <form class="space-y-4" wire:submit.prevent="submit">
            <flux:heading>Subir documento de diagnostico para el trabajador <span class="underline font-bold">{{ $employee?->first_name }} {{ $employee?->last_name }}</span>.</flux:heading>
            <flux:separator />
            <flux:input type="file" wire:model="document" />
            <div class="flex justify-end">
                <flux:button type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>