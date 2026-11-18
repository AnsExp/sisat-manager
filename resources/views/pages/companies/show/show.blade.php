@php
    /**
     * @var App\Models\Company $company
     * @var Illuminate\Database\Eloquent\Collection<int,App\Models\SisatModule> $modules
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
    <flux:heading size="lg" level="2">Objetivos a cumplir</flux:heading>
    <div class="space-y-2">
        @foreach ($modules as $module)
            <div class="rounded-xl border border-zinc-200 bg-white dark:border-zinc-700 dark:bg-zinc-900">
                <div class="border-b border-zinc-200 px-5 py-3.5 dark:border-zinc-700">
                    <flux:heading size="sm">{{ $module->name }}</flux:heading>
                </div>

                <div class="divide-y divide-zinc-100 dark:divide-zinc-800">
                    @foreach ($module->activities as $activity)
                        @if(App\Modules\ModuleChecker::checkActivity($company, $activity))
                            @php
                                $progress = App\Modules\ActivityCalculator::calculate($company, $activity) * 100;
                            @endphp

                            <div class="flex flex-col justify-between gap-4 px-5 py-3.5 sm:flex-row sm:items-center">
                                <flux:text class="font-medium text-zinc-800 dark:text-zinc-200">
                                    {{ $activity->name }}
                                </flux:text>

                                <div class="flex items-center gap-4">
                                    {{-- Barra de progreso --}}
                                    <div class="flex w-40 items-center gap-2.5">
                                        <div class="h-2 flex-1 overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-700">
                                            <div class="h-full rounded-full bg-zinc-900 dark:bg-white"
                                                style="width: {{ $progress }}%"></div>
                                        </div>
                                        <span class="w-9 text-right font-mono text-xs tabular-nums text-zinc-500">
                                            {{ $progress }}%
                                        </span>
                                    </div>

                                    {{-- Botón enlace con navegación SPA de Livewire --}}
                                    @php
                                        // Construimos el nombre de la ruta dinámicamente
                                        $routeName = 'companies.' . $module->slug . '.' . $activity->slug;

                                        // Verificamos si la ruta está registrada en el sistema; si no, usamos '#'
                                        $routeUrl = Route::has($routeName) ? route($routeName, $company) : '#';
                                    @endphp

                                    <flux:button href="{{ $routeUrl }}" size="xs" variant="ghost" icon-trailing="chevron-right">
                                        Detalles
                                    </flux:button>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
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
                            <flux:table.cell>{{ $employee->first_name . ' ' . $employee->last_name }}</flux:table.cell>
                            <flux:table.cell>{{ $employee->id_card }}</flux:table.cell>
                            <flux:table.cell>{{ $employee->workspace->name }}</flux:table.cell>
                            <flux:table.cell>{{ $employee->position->name }}</flux:table.cell>
                            <flux:table.cell>
                                <div class="flex gap-2 justify-end">
                                    <flux:button href="{{ route('employees.show', $employee) }}" icon="eye" variant="ghost"
                                        size="xs"></flux:button>
                            </flux:table.cell>
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