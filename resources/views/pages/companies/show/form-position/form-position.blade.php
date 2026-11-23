<div>
    <flux:modal name="form-position" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Crear cargo</flux:heading>
                <flux:text class="mt-2">Selecciona el area de trabajo e ingresa el nuevo cargo.</flux:text>
            </div>
            <form class="space-y-2" wire:submit.prevent="submit">
                <flux:select wire:model="workspace_id">
                    <flux:select.option value="">Area de trabajo</flux:select.option>
                    @foreach ($workspaces as $workspace)
                        <flux:select.option value="{{ $workspace->id }}">{{ $workspace->name }}</flux:select.option>
                    @endforeach
                </flux:select>
                <flux:input wire:model="name" placeholder="Área de trabajo" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit"> Guardar </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>