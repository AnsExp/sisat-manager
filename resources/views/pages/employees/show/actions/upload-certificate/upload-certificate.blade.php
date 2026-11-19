<div>
    <flux:modal name="upload-certificate">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Subir certificado médico</flux:heading>
                <flux:text class="mt-2">Selecciona los documentos a subir como evidencia de ausencia o enfermedad.
                </flux:text>
            </div>

            <form class="space-y-4" wire:submit.prevent="submit">
                <flux:select label="Tipo de evaluacion" wire:model="evaluationType">
                    <flux:select.option value="">Seleccione una opción...</flux:select.option>
                    @foreach (App\Enums\EvaluationType::cases() as $type)
                    <flux:select.option value="{{ $type->value }}">{{ $type->label() }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input label="Certificados" type="file" accept="application/pdf" wire:model="document" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Subir</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>