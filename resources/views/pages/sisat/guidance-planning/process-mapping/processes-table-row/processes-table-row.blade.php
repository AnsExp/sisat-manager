<flux:table.row>
    <flux:table.cell>
        <div class="flex flex-col">
            <p class="font-bold uppercase">
                {{ $result->results['name'] }}
            </p>
            <p class="text-xs">
                {{ $result->created_at?->translatedFormat('j M Y - H:i') }}
            </p>
        </div>
    </flux:table.cell>

    <flux:table.cell>
        <div class="flex gap-2 items-center">
            @if ($sha !== '')
                <p class="font-mono" title="{{ $sha }}">
                    {{ \Illuminate\Support\Str::limit($sha, 16, '…') }}
                </p>
                <flux:button type="button" class="button-copy-sign" data-sign="{{ $sha }}" variant="ghost" size="sm">
                    <flux:icon.clipboard class="size-4" />
                </flux:button>
            @else
                <span class="text-zinc-400">—</span>
            @endif
        </div>
    </flux:table.cell>

    <flux:table.cell>
        <flux:checkbox wire:model.lazy="isChecked" />
    </flux:table.cell>

    <flux:table.cell>
        <div class="flex gap-2 justify-end">
            <flux:button wire:click="download" variant="ghost" size="xs" icon="arrow-down-tray" />
            <flux:button wire:click="destroy" variant="ghost" size="xs" color="red" icon="trash" />
        </div>
    </flux:table.cell>
</flux:table.row>