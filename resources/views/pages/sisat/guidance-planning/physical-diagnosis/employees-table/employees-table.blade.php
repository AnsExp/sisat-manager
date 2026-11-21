@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <flux:table :paginate="$this->data">
        <flux:table.columns>
            <flux:table.column>Nombre</flux:table.column>
            <flux:table.column>Area</flux:table.column>
            <flux:table.column>Cargo</flux:table.column>
            <flux:table.column>Diagnostico</flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->data as $employee)
                @php
                    if ($loop->first) {
                        $currentEmployee = $employee;
                    }
                @endphp
                <flux:table.row>
                    <flux:table.cell>
                        {{ $employee->first_name }}
                        {{ $employee->last_name }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $employee->workspace->name }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $employee->position->name }}
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex gap-2 justify-end">
                            <flux:button wire:click="modalGenerate({{ $employee->id }})" variant="ghost" size="xs"
                                icon="document" />
                            <flux:button wire:click="modalUpdate({{ $employee->id }})" variant="ghost" size="xs"
                                icon="arrow-up-tray" />
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
    {{-- <livewire:pages::sisat.guidance-planning.physical-diagnosis.document-store /> --}}
    <livewire:pages::employees.show.actions.occupational-certificate :employee="$currentEmployee" />
    <livewire:pages::employees.show.actions.upload-certificate :employee="$currentEmployee" />
    {{-- <livewire:pages::companies.sisat.guidance-planning.general-diagnosis.document-store /> --}}
</div>