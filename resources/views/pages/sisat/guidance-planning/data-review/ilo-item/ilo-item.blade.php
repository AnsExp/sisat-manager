@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\IloItem $item
     * @var bool $open
     * @var bool $checked
     */
    $hasChildren = $item->children->isNotEmpty();
@endphp

<div>
    @if ($hasChildren)
        <flux:card body="inset" variant="soft" size="lg">
            <flux:card.header wire:click="toggleOpen" class="cursor-pointer select-none">
                <div class="flex items-center justify-between gap-2">
                    <flux:card.heading>
                        {{ $item->name }}
                    </flux:card.heading>

                    <flux:icon.chevron-down
                        class="size-4 transition-transform duration-150 {{ $open ? 'rotate-180' : '' }}"
                    />
                </div>
            </flux:card.header>

            @if ($open)
                <flux:card.body class="space-y-3">
                    @foreach ($item->children->sortBy('index') as $child)
                        <livewire:pages::companies.sisat.guidance-planning.data-review.ilo-item
                            :company="$company"
                            :item="$child"
                            :key="'ilo-node-' . $company->id . '-' . $child->id"
                        />
                    @endforeach
                </flux:card.body>
            @endif
        </flux:card>
    @else
        {{-- Ítem atómico (sin hijos): checkbox junto al nombre --}}
        <div class="flex items-center justify-between rounded-lg border border-zinc-200 bg-white px-4 py-3 dark:border-zinc-700 dark:bg-zinc-900">
            <flux:checkbox wire:model.live="checked" :label="$item->name" />
        </div>
    @endif
</div>