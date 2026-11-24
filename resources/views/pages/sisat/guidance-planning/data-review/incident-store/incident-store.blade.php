@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatActivity $activity
     */
@endphp

<div>
    <flux:modal name="incident-store">
        <form class="space-y-4" wire:submit.prevent="submit">
            <flux:heading>Nuevo caso</flux:heading>
            <flux:separator />
            <flux:select label="Tipo de incidente" wire:model="workIncident">
                <flux:select.option>Seleccione una opcion...</flux:select.option>
                @foreach (App\Enums\WorkIncidentType::cases() as $workIncident)
                    <flux:select.option value="{{ $workIncident->value }}">{{ $workIncident->label() }}</flux:select.option>
                @endforeach
            </flux:select>
            <flux:select label="Trabajador" wire:model="employeeId">
                <flux:select.option>Seleccione una opcion...</flux:select.option>
                @foreach ($company->employees()->orderBy('first_name')->get() as $employee)
                    <flux:select.option value="{{ $employee->id }}">{{ $employee->display_name() }}</flux:select.option>
                @endforeach
            </flux:select>
            <flux:input label="Fecha" type="date" max="{{ date('Y-m-d') }}" wire:model="date" />
            <flux:textarea label="Descripcion" wire:model="description" />
            <div class="flex justify-end">
                <flux:button type="submit">Guardar</flux:button>
            </div>
        </form>
    </flux:modal>
</div>