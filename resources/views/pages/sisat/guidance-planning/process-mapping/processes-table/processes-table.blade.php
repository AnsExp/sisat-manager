<div>
    <flux:table :paginate="$this->data">
        <flux:table.columns>
            <flux:table.column>Nombre</flux:table.column>
            <flux:table.column>Firma de seguridad</flux:table.column>
            <flux:table.column>Cumple</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->data as $result)
                <livewire:pages::sisat.guidance-planning.process-mapping.processes-table-row :result="$result" />
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>