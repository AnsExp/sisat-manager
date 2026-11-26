@use('App\Enums\PpeEfficiencyEvaluationStep')

<div>
    <flux:table>
        <flux:table.columns>
            <flux:table.column>EPP / protección</flux:table.column>
            @foreach (PpeEfficiencyEvaluationStep::cases() as $step)
                <flux:table.column align="center">{{ $step->label() }}</flux:table.column>
            @endforeach
            <flux:table.column />
        </flux:table.columns>

        <flux:table.rows>
            @forelse ($this->items as $item)
                <livewire:pages::sisat.information-analysis.ppe-efficiency-evaluation.ppe-item-row :item="$item"
                    :key="'ppe-item-' . $item->id" />
            @empty
                <flux:table.row>
                    <flux:table.cell colspan="6" class="text-zinc-500">
                        Aún no hay ítems. Usa «Agregar EPP» para crear la lista.
                    </flux:table.cell>
                </flux:table.row>
            @endforelse
        </flux:table.rows>
    </flux:table>
</div>
