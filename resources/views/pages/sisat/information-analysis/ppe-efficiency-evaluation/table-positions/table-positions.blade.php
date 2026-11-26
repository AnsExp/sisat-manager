@use('App\Enums\PpeEfficiencyEvaluationStep')

@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatActivity $activity
     */
@endphp

<flux:table>
    <flux:table.columns>
        <flux:table.column>Puesto</flux:table.column>
        @foreach (PpeEfficiencyEvaluationStep::cases() as $step)
            <flux:table.column align="center">{{ $step->label() }}</flux:table.column>
        @endforeach
    </flux:table.columns>

    <flux:table.rows>
        @forelse ($this->workspaces as $workspace)
            <flux:table.row wire:key="workspace-{{ $workspace->id }}">
                <flux:table.cell class="text-lg font-bold" colspan="5">
                    {{ $workspace->name }}
                </flux:table.cell>
            </flux:table.row>
            @forelse ($workspace->positions as $position)
                <livewire:pages::sisat.information-analysis.ppe-efficiency-evaluation.table-positions-row :company="$company"
                    :activity="$activity" :position="$position" :key="'position-' . $position->id" />
            @empty
                <flux:table.row wire:key="workspace-{{ $workspace->id }}-empty">
                    <flux:table.cell colspan="5" class="text-zinc-500">Sin puestos registrados en esta área.</flux:table.cell>
                </flux:table.row>
            @endforelse
        @empty
            <flux:table.row>
                <flux:table.cell colspan="5" class="text-zinc-500">La empresa no tiene áreas ni puestos registrados.</flux:table.cell>
            </flux:table.row>
        @endforelse
    </flux:table.rows>
</flux:table>
