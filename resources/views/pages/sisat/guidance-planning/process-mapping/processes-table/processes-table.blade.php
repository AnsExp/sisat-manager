<div>
    <flux:table :paginate="$this->data">
        <flux:table.columns>
            <flux:table.column>Nombre</flux:table.column>
            <flux:table.column>Mapa</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>

        <flux:table.rows>
            @foreach ($this->data as $result)
                <livewire:pages::sisat.guidance-planning.process-mapping.processes-table-row :result="$result"
                    :key="$result->id.'-'.md5(json_encode($result->results))" />
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>