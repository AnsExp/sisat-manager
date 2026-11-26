<div>
    <flux:modal name="ppe-item-store" class="md:w-96">
        <form class="space-y-4" wire:submit.prevent="submit">
            <flux:heading>Agregar EPP / protección</flux:heading>
            <flux:separator />
            <flux:input wire:model="name" label="EPP / protección"
                placeholder="Ej.: Protector auditivo, Guardas de prensas" />
            <div class="flex justify-end gap-2">
                <flux:modal.close>
                    <flux:button variant="ghost">Cancelar</flux:button>
                </flux:modal.close>
                <flux:button variant="primary" type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
