<div>
    <flux:card variant="filled">
        <div class="flex items-center gap-4">
            <h2 class="text-lg font-semibold">
                Documentos
            </h2>
            <flux:select class="w-69 text-sm" wire:model="filter">
                <option value="all">Todos</option>
                @foreach (App\Enums\DocumentType::cases() as $documentType)
                <option value="{{ $documentType->value }}">{{ $documentType->label() }}</option>
                @endforeach
            </flux:select>
        </div>

        <flux:table :paginate="$this->data">
            <flux:table.columns>
                <flux:table.column>Fecha</flux:table.column>
                <flux:table.column>Tipo</flux:table.column>
                <flux:table.column>Firma</flux:table.column>
                <flux:table.column></flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach ($this->data as $document)
                <flux:table.row>
                    <flux:table.cell>
                        {{ $document->created_at->translatedFormat('F d, Y') }}
                    </flux:table.cell>
                    <flux:table.cell>
                        {{ $document->document_type->label() }}
                    </flux:table.cell>
                    <flux:table.cell>
                        <div class="flex items-center">
                            <span>
                                {{ Illuminate\Support\Str::substr( $document->sha256, 0,16 )}}...
                            </span>
                            <flux:button class="button-copy-sign" data-sign="{{ $document->sha256 }}" size="sm" variant="ghost">
                                <flux:icon.document-duplicate class="size-4" />
                            </flux:button>
                            <flux:button wire:click="download('{{ $document->filepath }}')" size="sm" variant="ghost">
                                <flux:icon.arrow-down-tray class="size-4" />
                            </flux:button>
                        </div>
                    </flux:table.cell>
                    <flux:table.cell>
                        <flux:button variant="ghost" size="sm" icon="ellipsis-horizontal"></flux:button>
                    </flux:table.cell>
                </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>

    </flux:card>
</div>