@php
    /**
     * @var App\Models\Employee $employee
     * @var App\Models\SisatActivity $activity
     */
@endphp

<flux:table.row>
    <flux:table.cell>
        <div class="flex flex-col">
            <p class="font-bold">
                {{ $employee->display_name() }}
            </p>
            <p class="text-xs">
                {{ $employee->id_card }}
            </p>
        </div>
    </flux:table.cell>
    <flux:table.cell>
        <div class="flex flex-col">
            <p class="font-semibold">
                {{ $employee->position->name }}
            </p>
            <p class="text-xs">
                {{ $employee->workspace->name }}
            </p>
        </div>
    </flux:table.cell>
    <flux:table.cell>
        {{ $evaluations }}
    </flux:table.cell>
    <flux:table.cell>
        {{ $exams }}
    </flux:table.cell>
    <flux:table.cell>
        {{ $status }}
    </flux:table.cell>
    <flux:table.cell>
        <flux:button size="xs" wire:click="$dispatch('record-store',{employee:{{ $employee->id }}})">
            Registrar
        </flux:button>
    </flux:table.cell>
</flux:table.row>