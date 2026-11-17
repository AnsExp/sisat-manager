@php
/**
* @var App\Models\Employee $employee
*/
@endphp
<div>
    <flux:card variant="filled">
        <h2 class="mb-4 text-lg font-semibold">
            Información Personal
        </h2>
        <div class="grid gap-4 md:grid-cols-2">
            <div>
                <p class="text-xs text-zinc-500">
                    Primer nombre
                </p>
                <p class="font-medium">
                    {{ $employee->first_name }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Primer apellido
                </p>
                <p class="font-medium">
                    {{ $employee->last_name }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Segundo nombre
                </p>
                <p class="font-medium">
                    {{ $employee->second_first_name }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Segundo apellido
                </p>
                <p class="font-medium">
                    {{ $employee->second_last_name }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Cédula
                </p>
                <p class="font-medium">
                    {{ $employee->id_card }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Sexo
                </p>
                <p class="font-medium">
                    {{ $employee->gender->label() }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Correo electrónico
                </p>
                <p class="font-medium">
                    {{ $employee->email ?? '-' }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Teléfono
                </p>
                <p class="font-medium">
                    {{ $employee->phone ?? '-' }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Área
                </p>
                <p class="font-medium">
                    {{ $employee->workspace->name }}
                </p>
            </div>
            <div>
                <p class="text-xs text-zinc-500">
                    Cargo
                </p>
                <p class="font-medium">
                    {{ $employee->position->name }}
                </p>
            </div>
        </div>
    </flux:card>
</div>