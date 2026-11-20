@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    @php
        $currentEmployee = $this->data->first();
    @endphp

    @include('pages.sisat.components.employees-table.employees-table', [
        'employees' => $this->data,
        'actions' => 'pages.sisat.guidance-planning.physical-diagnosis.employees-table.actions',
    ])
    @if (isset($currentEmployee))
        <livewire:pages::employees.show.actions.occupational-certificate :employee="$currentEmployee" />
        <livewire:pages::employees.show.actions.upload-certificate :employee="$currentEmployee" />
    @endif
    <livewire:pages::sisat.guidance-planning.general-diagnosis.document-store />
</div>