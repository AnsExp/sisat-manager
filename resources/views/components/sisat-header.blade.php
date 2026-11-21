@props([
    'module',
    'company',
    'activity',
])

<div class="relative w-full">
    <flux:heading size="xl" level="1">{{ $company->name }}
    </flux:heading>
    <flux:subheading size="lg" class="font-bold">
        {{ $module->name }}
    </flux:subheading>
    <flux:subheading size="lg">
        {{ $activity->name }}
    </flux:subheading>
</div>
<flux:separator variant="subtle" />