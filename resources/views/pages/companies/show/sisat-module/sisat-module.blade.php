@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatModule $module
     */
@endphp

<div>
    @if ($module->activities)
        <flux:card body="inset" variant="outline" x-data="{ open: @entangle('open') }">
            <flux:card.header class="cursor-pointer select-none" wire:click="toggle">
                <flux:heading size="sm">{{ $module->name }}</flux:heading>
            </flux:card.header>

            <div x-show="open" x-collapse.duration.350ms>
                <flux:card.body>
                    @foreach ($module->activities as $activity)
                        @php
                            $progress = App\Modules\ActivityCalculator::calculate($company, $activity) * 100;
                        @endphp
                        <div class="flex flex-col justify-between gap-4 px-5 py-3.5 sm:flex-row sm:items-center">
                            <flux:text class="font-medium text-zinc-800 dark:text-zinc-200">
                                {{ $activity->name }}
                            </flux:text>

                            <div class="flex items-center gap-4">
                                <div class="flex w-40 items-center gap-2.5">
                                    <div class="h-2 flex-1 overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-700">
                                        <div class="h-full rounded-full bg-zinc-900 dark:bg-white"
                                            style="width: {{ $progress }}%">
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
            </div>
        </flux:card>
    @endif
</div>