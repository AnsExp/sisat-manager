@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />
    <div class="flex gap-4">
        <flux:card>
            <flux:card.body>
                <flux:subheading>
                    Numero total de trabajadores:
                    <p class="text-3xl font-black">{{ $company->employees()->count() }}</p>
                </flux:subheading>
            </flux:card.body>
        </flux:card>
        <flux:card>
            <flux:card.body>
                <flux:subheading>
                    Trabajadores diagnosticados:
                    <p class="text-3xl font-black">{{ $employeesDiagnose }}</p>
                </flux:subheading>
            </flux:card.body>
        </flux:card>
    </div>
    <livewire:pages::sisat.guidance-planning.general-diagnosis.employees-table :company="$company" />
    <livewire:pages::sisat.guidance-planning.general-diagnosis.document-store :activity="$activity" />
</div>