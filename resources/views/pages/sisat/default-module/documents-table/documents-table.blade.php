<div>
    <flux:table :paginate="$this->data">
        <flux:table.columns>
            <flux:table.column>Nombre</flux:table.column>
            <flux:table.column>Firma de seguridad</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->data as $result)
                <flux:table.row>
                    <flux:table.cell>
                        {{ $result->created_at }}
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex fap-2 items-center">
                            <p class="font-mono">
                                {{ Illuminate\Support\Str::limit($result->results['sha256'], 16) }}
                            </p>
                            <flux:button class="button-copy-sign" data-sign="{{ $result->results['sha256'] }}" variant="ghost" size="sm">
                                <flux:icon.clipboard class="size-4" />
                            </flux:button>
                        </div>
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex gap-2 justify-end">
                            <flux:button wire:click="download({{ $result->id }})" variant="ghost" size="xs"
                                icon="arrow-down-tray" />
                        </div>
                    </flux:table.cell>
                </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>