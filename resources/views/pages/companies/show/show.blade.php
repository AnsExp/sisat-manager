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

    @php
        $formattedProgress = number_format((float) $progress, 2, ',', '.');
        $clampedProgress = max(0, min(100, (float) $progress));

        [$badgeColor, $barColor, $statusLabel] = match (true) {
            $clampedProgress >= 80 => ['emerald', 'bg-emerald-500', 'Óptimo'],
            $clampedProgress >= 50 => ['amber', 'bg-amber-500', 'En progreso'],
            default => ['rose', 'bg-rose-500', 'Bajo'],
        };
    @endphp

    <div class="space-y-2">
        <div class="flex items-center justify-between gap-3">
            <flux:heading size="lg" level="2" class="font-mono tabular-nums tracking-tight">
                {{ $formattedProgress }}%
            </flux:heading>

            <flux:badge size="sm" :color="$badgeColor" inset="top bottom">
                {{ $statusLabel }}
            </flux:badge>
        </div>

        <div class="h-2.5 w-full overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-700">
            <div class="h-full rounded-full transition-all duration-500 {{ $barColor }}"
                style="width: {{ $clampedProgress }}%"></div>
        </div>
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