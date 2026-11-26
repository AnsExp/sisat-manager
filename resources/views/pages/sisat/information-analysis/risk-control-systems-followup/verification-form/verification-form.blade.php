@use('App\Enums\VerificationOutcome')
@use('Illuminate\Support\Carbon')

@php
    $verification = $this->verification;
    $monthLabel = $month ? Str::ucfirst(Carbon::parse($month . '-01')->translatedFormat('F Y')) : '';
@endphp

<div>
    <flux:modal name="verification-form" class="md:w-120">
        <div class="space-y-4">
            <div>
                <flux:heading>{{ $this->schedule?->name() }}</flux:heading>
                <flux:text>Verificación de {{ $monthLabel }}</flux:text>
            </div>

            <flux:separator />

            @if ($verification)
                {{-- Verificación ya registrada --}}
                <dl class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-2 text-sm">
                    <dt class="text-zinc-500">Fecha de ejecución</dt>
                    <dd>{{ Carbon::parse($verification['date'])->translatedFormat('d/m/Y') }}</dd>

                    <dt class="text-zinc-500">Resultado</dt>
                    <dd>{{ VerificationOutcome::tryFrom($verification['outcome'])?->label() }}</dd>

                    @if ($verification['findings'])
                        <dt class="text-zinc-500">No conformidades</dt>
                        <dd class="whitespace-pre-line">{{ $verification['findings'] }}</dd>
                    @endif

                    <dt class="text-zinc-500">Evidencia</dt>
                    <dd>{{ $verification['document']['name'] ?? 'Sin evidencia' }}</dd>

                    <dt class="text-zinc-500">Registrada</dt>
                    <dd>{{ Carbon::parse($verification['at'])->timezone(config('app.timezone'))->translatedFormat('d/m/Y H:i') }}</dd>
                </dl>

                <div class="flex justify-between gap-2">
                    <flux:button variant="danger" size="sm" wire:click="remove"
                        wire:confirm="¿Eliminar esta verificación? El mes volverá a quedar pendiente.">
                        Eliminar
                    </flux:button>
                    <flux:modal.close>
                        <flux:button variant="ghost">Cerrar</flux:button>
                    </flux:modal.close>
                </div>
            @else
                {{-- Registrar la verificación del mes --}}
                <form class="space-y-4" wire:submit.prevent="submit">
                    <flux:input label="Fecha de ejecución" type="date" min="{{ $month }}-01" max="{{ date('Y-m-d') }}"
                        wire:model="date" />

                    <flux:select label="Resultado" wire:model.live="outcome">
                        <flux:select.option value="">Seleccione una opcion...</flux:select.option>
                        @foreach (VerificationOutcome::cases() as $case)
                            <flux:select.option :value="$case->value">{{ $case->label() }}</flux:select.option>
                        @endforeach
                    </flux:select>

                    @if ($outcome === VerificationOutcome::NONCONFORMING->value)
                        <flux:textarea label="No conformidades detectadas" rows="3" wire:model="findings"
                            placeholder="Hallazgo, responsable y plazo de corrección" />
                    @endif

                    <flux:input label="Evidencia (PDF, opcional)" type="file" accept="application/pdf" wire:model="document" />

                    <div class="flex justify-end gap-2">
                        <flux:modal.close>
                            <flux:button variant="ghost">Cancelar</flux:button>
                        </flux:modal.close>
                        <flux:button type="submit" variant="primary">Registrar</flux:button>
                    </div>
                </form>
            @endif
        </div>
    </flux:modal>
</div>
