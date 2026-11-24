@php
    /**
     * @var App\Models\Company $company
     * @var Illuminate\Database\Eloquent\Collection<int,App\Models\IloItem> $items
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <flux:modal.trigger name="incident-store">
        <flux:button variant="primary" size="sm">Subir Caso</flux:button>
    </flux:modal.trigger>
    <livewire:pages::sisat.guidance-planning.data-review.incident-store :company="$company" :activity="$activity" />
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2">
        <livewire:pages::sisat.guidance-planning.data-review.incident-registered :company="$company"
            :activity="$activity" />
        <livewire:pages::sisat.guidance-planning.data-review.incident-registered :company="$company"
            :activity="$activity" />
        <livewire:pages::sisat.guidance-planning.data-review.incident-registered :company="$company"
            :activity="$activity" />
    </div>
</div>