@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <div class="relative w-full">
        <flux:heading size="xl" level="1">{{ $company->name }}
        </flux:heading>
        <flux:subheading size="lg" class="flex flex-row gap-3">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item>
                    1. Orientación y Planificación
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    Planificación de la gestión preventiva respecto a los riesgos a la salud asociados al inicio de
                    actividades: métodos de trabajo, servicios, inserción de maquinaria y equipos, incorporación de
                    personal, entre otros
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </flux:subheading>
    </div>
    <flux:separator variant="subtle" />
</div>