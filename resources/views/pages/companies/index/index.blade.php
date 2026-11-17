<div>
    <flux:modal.trigger name="form-store">
        <flux:button icon="plus" size="sm" variant="primary" wire:click="$dispatch('load-data')">Nuevo</flux:button>
    </flux:modal.trigger>

    <livewire:pages::companies.index.form-store />

    <flux:table :paginate="$this->data">
        <flux:table.columns>
            <flux:table.column>Empresa</flux:table.column>
            <flux:table.column>Riesgo</flux:table.column>
            <flux:table.column>N. E.</flux:table.column>
            <flux:table.column>Email</flux:table.column>
            <flux:table.column></flux:table.column>
        </flux:table.columns>
        <flux:table.rows>
            @foreach ($this->data as $company)
            <flux:table.row :key="$company->id">
                <flux:table.cell>{{ $company->name }}</flux:table.cell>
                <flux:table.cell class="whitespace-nowrap font-mono">{{ $company->ciiu->level->label() }}</flux:table.cell>
                <flux:table.cell class="whitespace-nowrap font-mono">{{ $company->employees()->count() }}</flux:table.cell>
                <flux:table.cell variant="strong">{{ $company->email ?? '-' }}</flux:table.cell>
                <flux:table.cell class="flex justify-end gap-2">
                    <flux:button variant="ghost" size="xs" icon="pencil"
                        wire:click="$dispatch('load-data',{id:{{ $company->id }}})"></flux:button>
                    <flux:button variant="ghost" size="xs" icon="eye" href="{{ route('companies.show', $company) }}">
                    </flux:button>
                    <flux:button variant="ghost" size="xs" icon="trash" color="red"></flux:button>
                </flux:table.cell>
            </flux:table.row>
            @endforeach
        </flux:table.rows>
    </flux:table>
</div>