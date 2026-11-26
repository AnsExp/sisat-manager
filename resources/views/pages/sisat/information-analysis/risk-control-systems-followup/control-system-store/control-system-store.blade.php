@use('App\Enums\VerificationFrequency')

<div>
    <flux:modal name="control-system-store" class="md:w-104">
        <form class="space-y-4" wire:submit.prevent="submit">
            <flux:heading>Agregar sistema de control</flux:heading>
            <flux:separator />

            <flux:input wire:model="name" label="Sistema de control"
                placeholder="Ej.: Extracción de humos de soldadura" />

            <flux:select wire:model="frequency" label="Frecuencia de verificación">
                <flux:select.option value="">Seleccione una opcion...</flux:select.option>
                @foreach (VerificationFrequency::cases() as $frequency)
                    <flux:select.option :value="$frequency->value">{{ $frequency->label() }}</flux:select.option>
                @endforeach
            </flux:select>

            <flux:input wire:model="start" type="month" label="Primera verificación" />

            <div class="flex justify-end gap-2">
                <flux:modal.close>
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>