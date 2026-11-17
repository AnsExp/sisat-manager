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
                    <flux:radio.group wire:model="conclution" label="Conclusión" variant="segmented" size="sm">
                        @foreach (App\Enums\ConclutionType::cases() as $conclution)
                        <flux:radio value="{{ $conclution->value }}" label="{{ $conclution->label() }}" />
                        @endforeach
                    </flux:radio.group>
                    <flux:textarea label="Detalles de la conclusión" wire:model="conclutionDetails"></flux:textarea>
                </div>
                <div class="space-y-2">
                    <flux:text>
                        Recomendaciones / Observaciones
                    </flux:text>
                    @foreach ($recommendations as $index => $recommendation)
                    <div class="flex gap-2" wire:key="recommendation-{{ $index }}">
                        <flux:input wire:model="recommendations.{{ $index }}"
                            placeholder="Escribe una recomendación u observación" />
                        <flux:button variant="ghost" color="red" icon="trash"
                            wire:click="removeRecommendation({{ $index }})" />
                    </div>
                    @endforeach
                    <flux:button class="w-full" wire:click="addRecommendation">Agregar una observación</flux:button>
                </div>
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Generar</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>