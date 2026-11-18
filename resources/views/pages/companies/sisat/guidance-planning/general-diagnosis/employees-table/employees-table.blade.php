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
                            @if ($this->employeeHasDocument($employee->id))
                                <flux:button wire:click="downloadDocument({{ $employee->id }})" variant="ghost" size="xs"
                                    icon="arrow-down-tray" />
                            @endif
                            <flux:button wire:click="$dispatch('document-store',{employeeId:{{ $employee->id }}})"
                                variant="ghost" size="xs" icon="arrow-up-tray" />
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
    <livewire:pages::companies.sisat.guidance-planning.general-diagnosis.document-store />
</div>