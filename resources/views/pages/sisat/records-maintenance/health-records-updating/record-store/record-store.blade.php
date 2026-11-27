@php
    use App\Enums\HealthRecordsUpdatingStatus;
    use App\Enums\HealthRecordsUpdatingResult;
    /**
     * @var App\Models\Employee $employee
     */
@endphp

<div>
    <flux:modal name="record-store">
        @if($employee !== null)
            <form class="space-y-4" wire:submit.prevent="submit">
                <flux:heading>Actualizar Expediente</flux:heading>
                <flux:separator />
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    <div class="space-y-4">
                        <flux:input label="Trabajador" value="{{ $employee->display_name() }}" readonly disabled />
                        <flux:input label="Fecha" type="date" wire:model="date" />
                        <flux:select label="Evaluaciones" wire:model="evaluations">
                            <flux:select.option value="">Seleccione una opcion</flux:select.option>
                            @foreach (HealthRecordsUpdatingStatus::cases() as $result)
                                <flux:select.option value="{{ $result->value }}">{{ $result->label() }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        <flux:select label="Examenes" wire:model="exams">
                            <flux:select.option value="">Seleccione una opcion</flux:select.option>
                            @foreach (HealthRecordsUpdatingStatus::cases() as $result)
                                <flux:select.option value="{{ $result->value }}">{{ $result->label() }}</flux:select.option>
                            @endforeach
                        </flux:select>
                        <flux:select label="Resultados" wire:model="result">
                            <flux:select.option value="">Seleccione una opcion</flux:select.option>
                            @foreach (HealthRecordsUpdatingResult::cases() as $result)
                                <flux:select.option value="{{ $result->value }}">{{ $result->label() }}</flux:select.option>
                            @endforeach
                        </flux:select>
                    </div>
                    <div class="space-y-4">
                        <flux:textarea label="Observaciones" rows="3" wire:model="observations" />
                        <flux:input label="Evidencia" type="file" wire:model="evidences" multiple />
                    </div>
                </div>
                <div class="flex justify-end">
                    <flux:button type="submit" variant="primary">Guardar</flux:button>
                </div>
            </form>
        @endif
    </flux:modal>
</div>

{{-- health_records_updating --}}