@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    @foreach ($processes as $index => $process)
        <flux:field variant="inline">
            <flux:checkbox :checked="(bool)$process->results['checked']"
                wire:click="toggleProcess({{ $process->id }}, $event.target.checked)" />
            <flux:label>{{ $process->results['label'] }}</flux:label>
        </flux:field>
    @endforeach
    <flux:button wire:click="$dispatch('load-process',{companyId:{{ $company->id }}})">Agregar procedimiento
    </flux:button>
    <livewire:pages::sisat.guidance-planning.process-mapping.process-store />
</div>