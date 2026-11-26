@use('App\Enums\VerificationOutcome')
@use('App\Enums\VerificationState')
@use('App\Support\ControlSystemSchedule')
@use('Illuminate\Support\Carbon')

@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatModule $module
     * @var App\Models\SisatActivity $activity
     */
    $totals = $this->totals;
    $months = ControlSystemSchedule::monthsOf($year);
@endphp

<div class="space-y-6">
    <x-sisat-header :company="$company" :module="$module" :activity="$activity" />

    <div class="flex flex-wrap items-center justify-between gap-4">
        <flux:modal.trigger name="control-system-store">
            <flux:button size="sm" variant="primary">Agregar sistema de control</flux:button>
        </flux:modal.trigger>

        {{-- Indicadores del año mostrado --}}
        <div class="flex flex-wrap gap-6 text-sm">
            <div>
                <span class="text-zinc-500 dark:text-zinc-400">Sistemas</span>
                <span class="font-semibold">{{ $totals['systems'] }}</span>
            </div>
            <div title="Verificaciones ejecutadas ÷ verificaciones programadas hasta la fecha">
                <span class="text-zinc-500 dark:text-zinc-400">Verificaciones ejecutadas {{ $year }}</span>
                <span class="font-semibold">{{ $totals['executed'] }} de {{ $totals['due'] }}</span>
                @if ($totals['due'] > 0)
                    <span class="text-xs text-zinc-500">({{ round($totals['executed'] / $totals['due'] * 100) }} %)</span>
                @endif
            </div>
            <div title="Sistemas cuya última verificación fue conforme ÷ sistemas verificados">
                <span class="text-zinc-500 dark:text-zinc-400">Sistemas eficaces</span>
                <span class="font-semibold">{{ $totals['effective'] }} de {{ $totals['verified'] }}</span>
                @if ($totals['verified'] > 0)
                    <span class="text-xs text-zinc-500">({{ round($totals['effective'] / $totals['verified'] * 100) }} %)</span>
                @endif
            </div>
        </div>
    </div>

        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <flux:button size="sm" variant="ghost" icon="chevron-left" wire:click="previousYear" />
                <flux:heading size="lg">Cronograma {{ $year }}</flux:heading>
                <flux:button size="sm" variant="ghost" icon="chevron-right" wire:click="nextYear" />
            </div>

            {{-- Leyenda --}}
            <div class="flex flex-wrap items-center gap-3 text-xs text-zinc-500 dark:text-zinc-400">
                <span class="flex items-center gap-1"><span class="size-3 rounded bg-green-500"></span> Conforme</span>
                <span class="flex items-center gap-1"><span class="size-3 rounded bg-amber-500"></span> Con no conformidades</span>
                <span class="flex items-center gap-1"><span class="size-3 rounded bg-red-500"></span> Atrasada</span>
                <span class="flex items-center gap-1"><span class="size-3 rounded border-2 border-blue-500"></span> Pendiente este mes</span>
                <span class="flex items-center gap-1"><span class="size-3 rounded bg-zinc-200 dark:bg-zinc-700"></span> Programada</span>
            </div>
        </div>

        <flux:table>
            <flux:table.columns>
                <flux:table.column>Sistema de control</flux:table.column>
                @foreach ($months as $month)
                    <flux:table.column align="center" @class(['font-bold text-blue-600' => $month === now()->format('Y-m')])>
                        {{ Str::ucfirst(Carbon::parse($month . '-01')->translatedFormat('M')) }}
                    </flux:table.column>
                @endforeach
                <flux:table.column />
            </flux:table.columns>

            <flux:table.rows>
                @forelse ($this->systems as $system)
                    <flux:table.row wire:key="control-system-{{ $system->result->id }}">
                        <flux:table.cell>
                            <p class="font-medium">{{ $system->name() }}</p>
                            <p class="text-xs text-zinc-500">{{ $system->frequency()->label() }}</p>
                        </flux:table.cell>

                        @foreach ($months as $month)
                            @php
                                $state = $system->state($month);
                                $outcome = VerificationOutcome::tryFrom($system->verification($month)['outcome'] ?? '');
                            @endphp
                            <flux:table.cell align="center">
                                @if ($state !== VerificationState::NONE)
                                    <button type="button" title="{{ $state->label() }}{{ $outcome ? ' · ' . $outcome->label() : '' }}"
                                        @disabled(! $state->isOpenable())
                                        @if ($state->isOpenable()) wire:click="$dispatch('verification-open', { id: {{ $system->result->id }}, month: '{{ $month }}' })" @endif
                                        @class([
                                            'size-5 rounded',
                                            'cursor-pointer' => $state->isOpenable(),
                                            'bg-green-500' => $outcome === VerificationOutcome::CONFORMING,
                                            'bg-amber-500' => $outcome === VerificationOutcome::NONCONFORMING,
                                            'bg-red-500' => $state === VerificationState::LATE,
                                            'border-2 border-blue-500' => $state === VerificationState::DUE,
                                            'bg-zinc-200 dark:bg-zinc-700' => $state === VerificationState::FUTURE,
                                        ])></button>
                                @endif
                            </flux:table.cell>
                        @endforeach

                        <flux:table.cell align="end">
                            <flux:button size="xs" variant="ghost" icon="trash"
                                wire:click="removeSystem({{ $system->result->id }})"
                                wire:confirm="¿Eliminar este sistema y todas sus verificaciones?" />
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="14" class="text-zinc-500">
                            Aún no hay sistemas de control. Usa «Agregar sistema de control» para crear la lista.
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>

        <flux:text class="text-xs">Haz clic en un mes programado que ya llegó para registrar o ver su verificación.</flux:text>

    {{-- Modales --}}
    <livewire:pages::sisat.information-analysis.risk-control-systems-followup.control-system-store :company="$company"
        :activity="$activity" />
    <livewire:pages::sisat.information-analysis.risk-control-systems-followup.verification-form :company="$company"
        :activity="$activity" />
</div>
