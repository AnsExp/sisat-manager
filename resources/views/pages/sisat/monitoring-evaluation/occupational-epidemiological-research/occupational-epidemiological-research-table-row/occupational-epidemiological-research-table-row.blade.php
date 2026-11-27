@php
    /**
     * @var App\Models\SisatResult $result
     */
@endphp

<flux:table.row>
    <flux:table.cell>
        {{ $result->results['activity'] }}
    </flux:table.cell>
    <flux:table.cell>
        {{ $displayMonth }}
    </flux:table.cell>
    <flux:table.cell>
        <flux:badge size="sm" color="{{ $statusColor }}">
            {{ $displayStatus }}
        </flux:badge>
    </flux:table.cell>
    <flux:table.cell>
        @if($participants)
            <div class="flex w-full min-w-28 flex-col gap-1">
                <div class="flex items-center justify-between">
                    <p class="text-xs">{{ $participants }}/{{ $result->results['called'] }}</p>
                    <p class="text-xs">{{ number_format(($participants / $result->results['called']) * 100, 2) }}%</p>
                </div>
                <div class="h-1 w-full shrink-0 overflow-hidden rounded-full bg-zinc-200 dark:bg-zinc-700">
                    <div class="h-full rounded-full bg-zinc-900 dark:bg-white"
                        style="width: {{ number_format(($participants / $result->results['called']) * 100, 2) }}%"></div>
                </div>
            </div>
        @else
            -
        @endif
    </flux:table.cell>
    <flux:table.cell>
        @if($evidence)
            <div class="flex gap-2 items-center">
                <flux:icon.paper-clip class="size-3" />
                {{ $evidence }}
            </div>
        @else
            -
        @endif
    </flux:table.cell>
    <flux:table.cell>
        @if($this->isExecuted() && $evidence)
            <flux:button wire:click="download" size="xs">
                Descargar
            </flux:button>
        @elseif(!$this->isExecuted())
            <flux:button wire:click="$dispatch('execution-store',{result:{{ $result->id }}})" size="xs">
                Registrar ejecucion
            </flux:button>
        @endif
    </flux:table.cell>
</flux:table.row>