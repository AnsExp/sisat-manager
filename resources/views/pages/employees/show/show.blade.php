<div class="space-y-6">
    <div class="relative w-full">
        <div class="mb-6">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item>
                    {{ $employee->company->name }}
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    {{ $employee->workspace->name }}
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    {{ $employee->position->name }}
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    {{ $employee->id_card }}
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
            <flux:heading size="xl" level="1">{{ $employee->first_name }} {{ $employee->last_name }}</flux:heading>
        </div>
        <flux:separator variant="subtle" />
    </div>
    <livewire:pages::employees.show.personal-data :employee="$employee" />
    <livewire:pages::employees.show.actions :employee="$employee" />
    <livewire:pages::employees.show.documents :employee="$employee" />
</div>