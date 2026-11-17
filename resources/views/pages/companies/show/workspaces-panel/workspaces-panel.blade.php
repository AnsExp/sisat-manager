@php
/**
* @var App\Models\Company $company
*/
@endphp
<div>
    <flux:navlist>
        @foreach ($company->workspaces()->orderBy('name')->get() as $ws)
        <flux:navlist.group heading="{{ $ws->name }}" expandable :expanded="$workspace?->id === $ws->id">
            @foreach ($ws->positions as $ps)
            <flux:navlist.item href="{{ route('companies.show.workspace.position', [$company, $ws, $ps]) }}"
                badge="{{ $ps->employees()->count() }}">
                {{ $ps->name }}
            </flux:navlist.item>
            @endforeach
            <flux:navlist.item href="{{ route('companies.show.workspace', [$company, $ws]) }}"
                badge="{{ $ws->employees()->count() }}">
                Todos
            </flux:navlist.item>
            <flux:navlist.item
                wire:click="$dispatch('form-position',{companyId:{{ $company->id }},workspaceId:{{ $ws->id }}})"
                class="cursor-pointer" icon="plus">
                Agregar cargo
            </flux:navlist.item>
        </flux:navlist.group>
        @endforeach
        <flux:navlist.item href="{{ route('companies.show', [$company]) }}"
            badge="{{ $company->employees()->count() }}">
            Todos
        </flux:navlist.item>
        <flux:navlist.item wire:click="$dispatch('form-workspace',{companyId:{{ $company->id }}})"
            class="cursor-pointer" icon="plus">
            Agregar área
        </flux:navlist.item>
    </flux:navlist>
</div>