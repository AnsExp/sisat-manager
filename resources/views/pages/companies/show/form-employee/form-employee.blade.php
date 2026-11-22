<div>
    <flux:modal name="form-employee">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Empleado</flux:heading>
                <flux:text class="mt-2">Ingresa el nombre del cargo dentro del área de.</flux:text>
            </div>
            <form class="space-y-4" wire:submit.prevent="submit">
                <flux:heading level="3">Información profesional</flux:heading>
                <flux:separator variant="subtle" />
                <div class="grid grid-cols-2 gap-2">
                    <flux:input label="Área" wire:model="workspace" variant="filled" readonly disabled />
                    <flux:input label="Cargo" wire:model="position" variant="filled" readonly disabled />
                </div>
                <flux:heading level="3">Información personal</flux:heading>
                <flux:separator variant="subtle" />
                <div class="grid grid-cols-2 gap-2">
                    <flux:input label="Primer nombre" wire:model="first_name" placeholder="John" />
                    <flux:input label="Segundo nombre" wire:model="second_first_name" placeholder="Doe" />
                    <flux:input label="Primer apellido" wire:model="last_name" placeholder="John" />
                    <flux:input label="Segundo apellido" wire:model="second_last_name" placeholder="Doe" />
                    <flux:input label="Cédula" wire:model="id_card" placeholder="0123456789" />
                    <flux:input type="date" label="Fecha de nacimiento" wire:model="birthday" :max="$maxBirthday" />
                    <flux:select label="Género" wire:model="gender">
                        <flux:select.option value="">Seleccione una opción...</flux:select.option>
                        @foreach (\App\Enums\Gender::cases() as $gender)
                            <flux:select.option value="{{ $gender->value }}">{{ $gender->label() }}</flux:select.option>
                        @endforeach
                    </flux:select>
                </div>
                <flux:heading level="3">Información de contacto</flux:heading>
                <flux:separator variant="subtle" />
                <div class="grid grid-cols-2 gap-2">
                    <flux:input label="Teléfono" wire:model="phone" placeholder="098 765 4321" />
                    <flux:input label="Email" wire:model="email" placeholder="john.doe@mail.com" type="email" />
                </div>
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit"> Guardar </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>