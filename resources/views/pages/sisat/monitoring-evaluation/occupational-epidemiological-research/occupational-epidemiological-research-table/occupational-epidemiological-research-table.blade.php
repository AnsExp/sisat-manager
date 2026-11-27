@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div>
    <flux:table :paginate="$this->data">
        <flux:table.columns>
            <flux:table.column>Actividad</flux:table.column>
            <flux:table.column>Mes</flux:table.column>
            <flux:table.column>Estado</flux:table.column>
            <flux:table.column>Participantes</flux:table.column>
            <flux:table.column>Evidencias</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->data as $result)
                <livewire:pages::sisat.monitoring-evaluation.occupational-epidemiological-research.occupational-epidemiological-research-table-row
                    :result="$result" :key="$result->id" />
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>