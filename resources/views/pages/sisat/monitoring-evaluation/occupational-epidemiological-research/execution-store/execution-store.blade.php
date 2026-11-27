@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div>
    <flux:modal name="execution-store">
        @if($result)
            <form class="space-y-4" wire:submit.prevent="submit">
                <div class="space-y-2">
                    <flux:heading size="lg" level="3">Programar actividad</flux:heading>
                    <flux:separator />
                </div>
                <flux:input label="Fecha de ejecucion" wire:model="date" type="date" />
                <div class="grid grid-cols-2 gap-2">
                    <flux:input label="Parcitipantes" wire:model="participants" type="number"></flux:input>
                    <flux:input label="Convocados" type="number" value="{{ $result->results['called'] }}" disabled readonly />
                </div>
                <flux:input label="Evidencias" wire:model="evidence" type="file" multiple />
                <div class="flex justify-end">
                    <flux:button variant="primary" type="submit">Guardar</flux:button>
                </div>
            </form>
        @endif
    </flux:modal>
</div>