@php
    /**
     * @var Illuminate\Support\Collection $activities
     */
@endphp

<div>
    @if (!$activities->isEmpty())
        <flux:card body="inset" variant="outline">
            <flux:card.header wire:click="toggle">
                <flux:heading size="sm">{{ $module->name }}</flux:heading>
            </flux:card.header>

            @if ($open)
                <flux:card.body>
                    @foreach ($activities as $activity)
                        @php
                            $progress = App\Modules\ActivityCalculator::calculate($company, $activity) * 100;
                        @endphp
                        <div class="flex flex-col justify-between gap-4 px-5 py-3.5 sm:flex-row sm:items-center">
                            <flux:text class="font-medium text-zinc-800 dark:text-zinc-200">
                                {{ $activity->name }}
                            </flux:text>

                            <div class="flex items-center gap-4">
                                {{-- Barra de progreso --}}
                                <div class="flex w-40 items-center gap-2.5">
                                    <div class="h-2 flex-1 overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-700">
                                        <div class="h-full rounded-full bg-zinc-900 dark:bg-white" style="width: {{ $progress }}%">
                                        </div>
                                    </div>
                                    <span class="w-9 text-right font-mono text-xs tabular-nums text-zinc-500">
                                        {{ number_format($progress, 2) }}%
                                    </span>
                                </div>

                                <flux:button href="{{ route('sisat.activity', [$company, $module, $activity]) }}" size="xs"
                                    variant="ghost" icon-trailing="chevron-right">
                                    Detalles
                                </flux:button>
                            </div>
                        </div>
                    @endforeach
                </flux:card.body>
            @endif
        </flux:card>
    @endif
</div>