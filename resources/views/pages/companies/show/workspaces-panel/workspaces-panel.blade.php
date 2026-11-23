@php
    /**
     * @var App\Models\Company $company
     */
@endphp
<div>
    <flux:navlist>
        @foreach ($company->workspaces()->orderBy('name')->get() as $workspace)
            <flux:navlist.group heading="{{ $workspace->name }}" expandable :expanded="false">
                @foreach ($workspace->positions as $position)
                    <flux:navlist.item wire:click="delimitData('position',{{ $position->id }})"
                        badge="{{ $position->employees()->count() }}">
                        {{ $position->name }}
                    </flux:navlist.item>
                @endforeach
                <flux:navlist.item wire:click="delimitData('workspace',{{ $workspace->id }})"
                    badge="{{ $workspace->employees()->count() }}">
                    Todos
                </flux:navlist.item>
            </flux:navlist.group>
        @endforeach
        <flux:navlist.item wire:click="delimitData('company',{{ $company->id }})"
            badge="{{ $company->employees()->count() }}">
            Todos
        </flux:navlist.item>
    </flux:navlist>
</div>