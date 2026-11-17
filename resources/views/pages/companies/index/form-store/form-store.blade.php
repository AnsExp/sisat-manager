@php

    /**
     * @var App\Models\Company|null $company
     */

@endphp

<div>
    <flux:modal name="form-store">
        <form wire:submit.prevent="submit" class="space-y-6">
            <div>
                <flux:heading size="lg">{{ $company?->name ?? 'Crear empresa' }}</flux:heading>
                <flux:text class="mt-2">Llena los campos del formulario para crear una nueva empresa.</flux:text>
            </div>
            <flux:input label="Nombre" placeholder="Ejemplo" wire:model="name" max="255"
                value="{{ $company?->name }}" />
            <flux:input label="RUC" placeholder="0751057027001" wire:model="ruc" value="{{ $company?->ruc }}" />
            <flux:input label="CIIU" placeholder="A0111.11" wire:model.lazy="ciiu" value="" />
            @if ($ciiuSelected)
                <flux:card>
                    <flux:card.header>
                        <div class="flex items-center justify-between gap-2">
                            <flux:badge size="sm" icon="exclamation-triangle">
                                Nivel de riesgo:
                                {{($ciiuSelected->level->label())}}
                            </flux:badge>
                        </div>
                    </flux:card.header>
                    <flux:card.body>
                        <flux:text class="text-xs leading-snug text-zinc-700 dark:text-zinc-300">
                            {{ $ciiuSelected->description }}
                        </flux:text>
                    </flux:card.body>
                </flux:card>
            @endif
            <flux:input label="Correo" placeholder="john.doe@email.com" wire:model="email"
                value="{{ $company?->email }}" />
            <flux:textarea label="Dirección" placeholder="Avenida siempre viva" wire:model="address" max="255">
                {{ $company?->address }}
            </flux:textarea>
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>