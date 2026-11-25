@use('App\Enums\WorkHazardBaselineStep')

@php
    /**
     * @var App\Models\Position $position
     */
@endphp

<flux:table.row>
    <flux:table.cell>
        {{ $position->name }}
    </flux:table.cell>

    @foreach (WorkHazardBaselineStep::cases() as $step)
        @php $reachedAt = $this->reachedAt($step); @endphp
        <flux:table.cell>
            <div class="flex flex-col items-center gap-1">
                <flux:checkbox wire:model.live="checked.{{ $step->value }}" :disabled="! $this->canToggle($step)" />
                <span class="text-[8pt] text-zinc-500 dark:text-zinc-400" title="Marcado el">
                    {{ $reachedAt?->timezone(config('app.timezone'))->translatedFormat('d/m/Y H:i') ?? '' }}
                </span>
            </div>
        </flux:table.cell>
    @endforeach
</flux:table.row>
