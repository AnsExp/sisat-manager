@php
    /**
     * @var App\Models\Company $company
     * @var Illuminate\Database\Eloquent\Collection<int,App\Models\IloItem> $items
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <div class="space-y-3">
        @foreach ($items as $item)
        <livewire:pages::sisat.guidance-planning.data-review.ilo-item :company="$company" :item="$item" />
        @endforeach
    </div>
</div>