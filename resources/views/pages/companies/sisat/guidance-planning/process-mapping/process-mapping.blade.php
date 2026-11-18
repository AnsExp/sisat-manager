@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <div class="relative w-full">
        <flux:heading size="xl" level="1">{{ $company->name }}
        </flux:heading>
        <flux:subheading size="lg" class="flex flex-row gap-3">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item>
                    1. Orientación y Planificación
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    Mapeo de procesos de la actividad laboral, métodos de trabajo (procedimientos)
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </flux:subheading>
    </div>
    <flux:separator variant="subtle" />
    @foreach ($processes as $index => $process)
        <flux:field variant="inline">
            <flux:checkbox :checked="(bool)$process->results['checked']"
                wire:click="toggleProcess({{ $process->id }}, $event.target.checked)" />
            <flux:label>{{ $process->results['label'] }}</flux:label>
        </flux:field>
    @endforeach
    <flux:button wire:click="$dispatch('load-process',{companyId:{{ $company->id }}})">Agregar procedimiento
    </flux:button>
    <livewire:pages::companies.sisat.guidance-planning.process-mapping.process-store />
</div>