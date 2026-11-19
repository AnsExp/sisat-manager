@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div>
    <flux:modal name="document-store">
        <form class="space-y-4" wire:submit.prevent="submit">
            <flux:heading>Subir documento de diagnostico para el trabajador <span
                    class="underline font-bold">{{ $employee?->first_name }} {{ $employee?->last_name }}</span>.
            </flux:heading>
            <flux:separator />
            <flux:select label="Tipo de Evaluacion" wire:model="evaluationType">
                <flux:select.option value="">Seleccione una opcion...</flux:select.option>
                @foreach ($evaluationsTypes as $evaluationType)
                    <flux:select.option value="{{ $evaluationType->value }}">
                        {{ $evaluationType->label() }}
                    </flux:select.option>
                @endforeach
            </flux:select>
            <flux:input type="file" wire:model="document" />
            <div class="flex justify-end">
                <flux:button type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>