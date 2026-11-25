@use('App\Enums\ManagementPlanningStatus')
@use('App\Enums\ManagementPlanningType')
@use('Illuminate\Support\Carbon')

@php
    $next = $this->stage->next();
@endphp

<div>
    <flux:card body="inset" variant="soft">
        <flux:card.header>
            <div class="flex items-center justify-between gap-2">
                <flux:heading size="lg" level="2">{{ $this->stage->label() }}</flux:heading>
                <flux:badge size="sm">{{ $this->changes->total() }}</flux:badge>
            </div>
        </flux:card.header>

        <flux:card.body>
            <div class="space-y-4">
                @forelse ($this->changes as $change)
                    <flux:card variant="soft" wire:key="change-{{ $change->id }}">
                        {{-- Número de cambio y fecha --}}
                        <flux:card.header>
                            <div class="flex items-center justify-between gap-2 text-xs">
                                <span class="font-mono">#{{ $change->id }}</span>
                                <span title="Fecha del cambio">
                                    {{ Carbon::parse($change->results['date'])->translatedFormat('d/m/Y') }}
                                </span>
                            </div>
                        </flux:card.header>

                        <flux:card.body>
                            <p class="font-bold text-[9pt]">
                                {{ ManagementPlanningType::tryFrom($change->results['management_planning'] ?? '')?->label() ?? 'Sin tipo' }}
                            </p>
                            <p class="text-[9pt]">
                                {{ $this->employeeOf($change)?->display_name() ?? 'Trabajador no encontrado' }}
                            </p>
                            @if ($change->results['description'] ?? null)
                                <p class="mt-1 text-[8pt] text-zinc-500 dark:text-zinc-400 line-clamp-2">
                                    {{ $change->results['description'] }}
                                </p>
                            @endif

                            {{-- Cuándo alcanzó el cambio cada etapa --}}
                            <ul class="mt-3 space-y-1 text-[8pt] text-zinc-500 dark:text-zinc-400">
                                @foreach (ManagementPlanningStatus::cases() as $stage)
                                    @php $reachedAt = $this->reachedAt($change, $stage); @endphp
                                    <li class="flex items-center gap-1.5 {{ $reachedAt ? '' : 'opacity-50' }}">
                                        <flux:icon :name="$reachedAt ? 'check-circle' : 'clock'" variant="micro" class="size-3" />
                                        <span>{{ $stage->label() }}:</span>
                                        <span>{{ $reachedAt?->timezone(config('app.timezone'))->translatedFormat('d/m/Y H:i') ?? 'pendiente' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </flux:card.body>

                        @if ($next)
                            <flux:card.footer>
                                <div class="flex justify-end">
                                    <flux:button wire:click="advance({{ $change->id }})" icon:trailing="arrow-right"
                                        size="xs" variant="ghost">
                                        {{ $next->label() }}
                                    </flux:button>
                                </div>
                            </flux:card.footer>
                        @endif
                    </flux:card>
                @empty
                    <p class="text-xs text-zinc-500">Sin cambios en esta etapa.</p>
                @endforelse

                @if ($this->changes->hasPages())
                    <flux:pagination :paginator="$this->changes" />
                @endif
            </div>
        </flux:card.body>
    </flux:card>
</div>
