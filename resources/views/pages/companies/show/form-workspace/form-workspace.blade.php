<div>
    <flux:modal name="form-workspace" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Crear área de trabajo</flux:heading>
                <flux:text class="mt-2">Ingresa el nombre de la área de trabajo que quieres registrar.</flux:text>
            </div>
            <form class="space-y-6" wire:submit.prevent="submit">
                <flux:input wire:model="name" placeholder="Área de trabajo" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit"> Guardar </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>