@php
/**
* @var App\Models\Company $company
*/
@endphp

<div class="space-y-6">
    <div class="relative w-full">
        <flux:heading size="xl" level="1">{{ $company->name }}</flux:heading>
        <flux:subheading size="lg" class="flex flex-row gap-3">
            <p>RUC: {{ $company->ruc }}</p>
            <p>·</p>
            <p>{{ $company->employees()->count() }} empleados</p>
            <p>·</p>
            <p>CIIU: {{ $company->ciiu->code }}</p>
            <p>·</p>
            <p>Riesgo {{ $company->ciiu->level->label() }}</p>
        </flux:subheading>
        <flux:text class="mb-6">
            {{ $company->ciiu->description }}
        </flux:text>
        <flux:separator variant="subtle" />
    </div>
    <div class="flex items-start">

        <div class="w-1/4">
            <livewire:pages::companies.show.workspaces-panel :company="$company" :workspace="$workspace"
                :position="$position" />
        </div>

        <div class="w-3/4 px-4 space-y-4">

            <flux:breadcrumbs>
                <flux:breadcrumbs.item>
                    {{ $company->name }}
                </flux:breadcrumbs.item>
                @if($workspace)
                <flux:breadcrumbs.item>
                    {{ $workspace->name }}
                </flux:breadcrumbs.item>
                @if($position)
                <flux:breadcrumbs.item>
                    {{ $position->name }}
                </flux:breadcrumbs.item>
                @endif
                @endif
            </flux:breadcrumbs>

            <div class="flex items-center justify-between">
                @if($workspace && !$position)
                <div class="flex gap-2 items-center">
                    <flux:heading size="lg" level="2">
                        {{ $workspace->name }}
                    </flux:heading>
                    <flux:button size="xs" variant="ghost" icon="pencil"
                        wire:click="$dispatch('form-workspace',{companyId:{{ $company->id }},workspaceId:{{ $workspace->id }}})" />
                </div>
                <flux:button size="sm" variant="ghost" color="red">
                    Eliminar Área
                </flux:button>
                @elseif($position)
                <div class="flex gap-2 items-center">
                    <flux:heading size="lg" level="2">
                        {{ $position->name }}
                    </flux:heading>
                    <flux:button size="xs" variant="ghost" icon="pencil"
                        wire:click="$dispatch('form-position',{companyId:{{ $company->id }},workspaceId:{{ $workspace->id }},positionId:{{ $position->id }}})" />
                    <flux:button size="sm"
                        wire:click="$dispatch('form-employee',{employee_id:null,company_id:{{ $company->id }},workspace_id:{{ $workspace?->id ?? 'null' }},position_id:{{ $position?->id ?? 'null' }}})">
                        Nuevo empleado
                    </flux:button>
                </div>
                <flux:button size="sm" variant="ghost" color="red">
                    Eliminar Cargo
                </flux:button>
                @endif
            </div>

            <flux:table :paginate="$this->employees" class="w-full">
                <flux:table.columns>
                    <flux:table.column>Nombre</flux:table.column>
                    <flux:table.column>Cédula</flux:table.column>
                    <flux:table.column>Área</flux:table.column>
                    <flux:table.column>Cargo</flux:table.column>
                    <flux:table.column></flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @foreach ($this->employees as $employee)
                    <flux:table.row>
                        <flux:table.cell>{{ $employee->first_name . ' '. $employee->last_name }}</flux:table.cell>
                        <flux:table.cell>{{ $employee->id_card }}</flux:table.cell>
                        <flux:table.cell>{{ $employee->workspace->name }}</flux:table.cell>
                        <flux:table.cell>{{ $employee->position->name }}</flux:table.cell>
                        <flux:table.cell>
                            <div class="flex gap-2 justify-end">
                                <flux:button href="{{ route('employees.show', $employee) }}" icon="eye" variant="ghost" size="xs"></flux:button>
                        </flux:table.cell>
        </div>
        </flux:table.row>
        @endforeach
        </flux:table.rows>
        </flux:table>
    </div>
</div>
<livewire:pages::companies.show.form-workspace />
<livewire:pages::companies.show.form-position />
<livewire:pages::companies.show.form-employee />
</div>