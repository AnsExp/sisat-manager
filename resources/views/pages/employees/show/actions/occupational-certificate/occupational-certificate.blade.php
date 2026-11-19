<div>
    <flux:modal name="generate-occupational-certificate">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Certificiado medicina ocupacional</flux:heading>
                <flux:text class="mt-2">
                    Llena los campos y genera un certificado de medicina ocupacional
                </flux:text>
            </div>

            <form class="space-y-4" wire:submit.prevent="submit">
                <flux:select label="Tipo de evaluación" wire:model="evaluationType">
                    <flux:select.option value="">Seleccione una opción...</flux:select.option>
                    @foreach (App\Enums\EvaluationType::cases() as $type)
                        <flux:select.option value="{{ $type->value }}">{{ $type->label() }}</flux:select.option>
                    @endforeach
                </flux:select>
                <div class="space-y-2">
                    <flux:text>
                        Después de la valoración médica ocupacional se certifica que la persona en mención, es
                        calificada como:
                    </flux:text>
                    <flux:radio.group wire:model="workAptitude" label="Conclusión" variant="segmented" size="sm">
                        @foreach (App\Enums\WorkAptitude::cases() as $workAptitude)
                            <flux:radio value="{{ $workAptitude->value }}" label="{{ $workAptitude->label() }}" />
                        @endforeach
                    </flux:radio.group>
                    <flux:textarea label="Restricciones" wire:model="restrictions"></flux:textarea>
                </div>
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Generar</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>