<div>
    <div class="flex flex-col lg:flex-row gap-2 lg:items-start">

        <div class="w-full lg:w-1/4">
            <livewire:pages::companies.show.workspaces-panel :company="$company" />
        </div>

        <div class="w-full lg:w-3/4">
            <flux:table :paginate="$this->employees" class="w-full">
                <flux:table.columns>
                    <flux:table.column>Empleado</flux:table.column>
                    <flux:table.column>Cédula</flux:table.column>
                    <flux:table.column>Área</flux:table.column>
                    <flux:table.column>Cargo</flux:table.column>
                    <flux:table.column></flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @foreach ($this->employees as $employee)
                        <flux:table.row>
                            <flux:table.cell>
                                {{ $employee->display_name() }}
                            </flux:table.cell>
                            <flux:table.cell class="font-mono">
                                {{ $employee->id_card }}
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:badge size="sm">
                                    {{ $employee->workspace->name }}
                                </flux:badge>
                            </flux:table.cell>
                            <flux:table.cell>{{ $employee->position->name }}</flux:table.cell>
                            <flux:table.cell>
                                <div class="flex justify-end">
                                    <flux:button href="{{ route('employees.show', $employee) }}" icon="eye" size="xs">
                                        Ficha
                                    </flux:button>
                                </div>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforeach
                </flux:table.rows>
            </flux:table>
        </div>
    </div>
</div>