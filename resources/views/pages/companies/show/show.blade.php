@php
    /**
     * @var App\Models\Company $company
     * @var Illuminate\Support\Collection<int,App\Models\SisatModule> $modules
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
            <livewire:pages::companies.show.sisat-module :company="$company" :module="$module" />
        @endforeach
    </div>
    <div class="flex justify-between items-center">
        <div>
            <flux:heading size="lg" level="2">Estructura Organizacional y Personal</flux:heading>
            <flux:subheading>Gestiona las áreas de trabajo, cargos y nómina asignada para evaluaciones.
            </flux:subheading>
        </div>
        <div class="flex gap-2">
            <flux:modal.trigger name="form-workspace">
                <flux:button size="sm" icon="plus">Área</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="form-position">
                <flux:button size="sm" icon="plus">Cargo</flux:button>
            </flux:modal.trigger>
            <flux:modal.trigger name="form-employee">
                <flux:button size="sm" icon="plus" variant="primary">Empleado</flux:button>
            </flux:modal.trigger>
        </div>
    </div>
    <flux:card body="inset" variant="outline">
        <flux:card.body>
            <livewire:pages::companies.show.company-employees :company="$company" />
        </flux:card.body>
    </flux:card>
    <livewire:pages::companies.show.form-workspace :company="$company" />
    <livewire:pages::companies.show.form-position :company="$company" />
    <livewire:pages::companies.show.form-employee :company="$company" />
</div>