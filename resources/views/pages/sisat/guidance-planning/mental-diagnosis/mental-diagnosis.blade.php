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
                    Diagnóstico de salud mental del trabajador
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </flux:subheading>
    </div>
    <flux:separator variant="subtle" />
    <div class="flex gap-4">
        <flux:card>
            <flux:card.body>
                <flux:subheading>
                    Numero total de trabajadores:
                    <p class="text-3xl font-black">{{ $company->employees()->count() }}</p>
                </flux:subheading>
            </flux:card.body>
        </flux:card>
    </div>
    <livewire:pages::sisat.guidance-planning.mental-diagnosis.employees-table :company="$company" />
    <livewire:pages::sisat.guidance-planning.mental-diagnosis.document-store />
</div>