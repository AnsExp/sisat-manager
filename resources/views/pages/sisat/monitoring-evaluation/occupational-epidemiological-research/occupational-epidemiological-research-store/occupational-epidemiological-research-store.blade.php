@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div>
    <flux:modal name="occupational-epidemiological-research-store">
        <form class="space-y-4" wire:submit.prevent="submit">
            <div class="space-y-2">
                <flux:heading size="lg" level="3">Programar actividad</flux:heading>
                <flux:separator />
            </div>
            <flux:input label="Actividad" wire:model="activityName"></flux:input>
            <flux:input label="Mes" wire:model="month" type="month"></flux:input>
            <flux:input label="Convocados" wire:model="called" type="number"></flux:input>
            <div class="flex justify-end">
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>