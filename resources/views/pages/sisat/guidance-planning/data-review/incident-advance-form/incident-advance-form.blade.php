@use('App\Enums\WorkIncidentType')
@use('Illuminate\Support\Carbon')

<div>
    <flux:modal name="incident-advance" class="md:w-120">
        <form class="space-y-4" wire:submit.prevent="submit">
            {{-- Etapa actual → etapa nueva --}}
            <flux:heading>
                <div class="flex items-center gap-4">
                    <p>{{ $this->fromStage?->label() }}</p>
                    <flux:icon.arrow-right class="size-4" />
                    <p>{{ $this->toStage?->label() }}</p>
                </div>
            </flux:heading>

            @if ($incident)
                <flux:text>
                    Caso #{{ $incident->id }} ·
                    {{ WorkIncidentType::tryFrom($incident->results['work_incident'] ?? '')?->label() ?? 'Sin tipo' }} ·
                    {{ Carbon::parse($incident->results['date'])->translatedFormat('d/m/Y') }}
                </flux:text>
            @endif

            <flux:separator />

            <flux:input label="Fecha" type="date" min="{{ $incident?->results['date'] }}" max="{{ date('Y-m-d') }}"
                wire:model="date" />
            <flux:textarea label="Detalle" rows="3" wire:model="details" placeholder="{{ $this->toStage?->detailHint() }}" />
            <flux:input label="Evidencia (PDF, opcional)" type="file" accept="application/pdf" wire:model="document" />

            <div class="flex justify-end gap-2">
                <flux:modal.close>
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="primary">Marcar como {{ $this->toStage?->label() }}</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
