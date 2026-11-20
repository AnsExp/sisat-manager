@php
    /**
     * @var App\Models\Company $company
     * @var Illuminate\Database\Eloquent\Collection<int,App\Models\IloItem> $items
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
                    Revisión de los datos disponibles de enfermedades profesionales y accidentes
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </flux:subheading>
    </div>
    <flux:separator variant="subtle" />

    <div class="space-y-3">
        @foreach ($items as $item)
        <livewire:pages::companies.sisat.guidance-planning.data-review.ilo-item :company="$company" :item="$item" />
        @endforeach
    </div>
</div>