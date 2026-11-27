@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatModule $module
     * @var App\Models\SisatActivity $activity
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <livewire:pages::sisat.records-maintenance.health-records-updating.table-employees :company="$company"
        :activity="$activity" />
    <livewire:pages::sisat.records-maintenance.health-records-updating.record-store :company="$company"
        :activity="$activity" />
</div>