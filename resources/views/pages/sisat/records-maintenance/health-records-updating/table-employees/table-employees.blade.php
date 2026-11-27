@php
    /**
     * @var App\Models\SisatModule $module
     * @var App\Models\SisatActivity $activity
     */
@endphp

<flux:table :paginate="$this->data">
    <flux:table.columns>
        <flux:table.column>Trabajador</flux:table.column>
        <flux:table.column>Puesto / Area</flux:table.column>
        <flux:table.column>Evaluaciones</flux:table.column>
        <flux:table.column>Examenes</flux:table.column>
        <flux:table.column>Estado</flux:table.column>
        <flux:table.column></flux:table.column>
    </flux:table.columns>
    <flux:table.rows>
        @foreach ($this->data as $employee)
            <livewire:pages::sisat.records-maintenance.health-records-updating.table-employees-row :employee="$employee"
                :activity="$activity" :key="$employee->id" />
        @endforeach
    </flux:table.rows>
</flux:table>