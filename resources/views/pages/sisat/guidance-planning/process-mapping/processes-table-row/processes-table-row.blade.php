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
            @if ($result->results['map']['sha256'])
                <p class="font-mono" title="{{ $result->results['map']['sha256'] }}">
                    {{ \Illuminate\Support\Str::limit($sha, 16, '…') }}
                </p>
                <flux:button type="button" class="button-copy-sign" data-sign="{{ $result->results['map']['sha256'] }}"
                    variant="ghost" size="sm">
                    <flux:icon.clipboard class="size-4" />
                </flux:button>
            @else
                <flux:button type="button" wire:click="uploadMap" size="xs" icon="arrow-up-tray">
                    Subir mapa
                </flux:button>
            @endif
        </div>
    </flux:table.cell>

    <flux:table.cell>
        <div class="flex gap-2 justify-end">
            @if ($result->results['map']['path'])
                <flux:button wire:click="download" variant="ghost" size="xs" icon="arrow-down-tray" />
            @endif
            <flux:button wire:click="destroy" variant="ghost" size="xs" color="red" icon="trash" />
        </div>
    </flux:table.cell>
</flux:table.row>