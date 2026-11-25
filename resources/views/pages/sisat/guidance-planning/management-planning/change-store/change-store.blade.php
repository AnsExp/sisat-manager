@use('App\Enums\ManagementPlanningType')

<div>
    <flux:modal name="change-store">
        <form class="space-y-4" wire:submit.prevent="submit">
            <flux:heading>Nuevo cambio</flux:heading>
            <flux:separator />

            <flux:select label="Tipo de cambio" wire:model="changeType">
                <flux:select.option value="">Seleccione una opción...</flux:select.option>
                @foreach (ManagementPlanningType::cases() as $type)
                    <flux:select.option value="{{ $type->value }}">{{ $type->label() }}</flux:select.option>
                @endforeach
            </flux:select>

            <flux:select label="Trabajador" wire:model="employeeId">
                <flux:select.option value="">Seleccione una opción...</flux:select.option>
                @foreach ($company->employees()->orderBy('first_name')->get() as $employee)
                    <flux:select.option value="{{ $employee->id }}">{{ $employee->display_name() }}</flux:select.option>
                @endforeach
            </flux:select>

            <flux:input label="Fecha" type="date" max="{{ date('Y-m-d') }}" wire:model="date" />
            <flux:textarea label="Descripción" wire:model="description" placeholder="Qué cambia y dónde" />

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
