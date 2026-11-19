@php
    /**
     * @var App\Models\Company $company
     */
@endphp

<div class="space-y-6">
    <div class="relative w-full">
        <flux:heading size="xl" level="1">{{ $company->name }}
        </flux:heading>
        <flux:subheading size="lg" class="flex flex-row gap-3">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item>
                    1. Orientación y Planificación
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item>
                    Revisión de los datos disponibles de enfermedades profesionales y accidentes
                </flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </flux:subheading>
    </div>
    <flux:separator variant="subtle" />

    <div>
        <ol class="list-none pl-6 space-y-4">
            @foreach (config('oit_list') as $oit)
                <li class="font-semibold">
                    <span>{{ $oit['code'] }}. {{ $oit['name'] }}</span>
                    @if (!empty($oit['subitems']))
                        <ol class="list-none pl-6 mt-2 space-y-3 font-normal">
                            @foreach ($oit['subitems'] as $subitem)
                                <li>
                                    <span>{{ $subitem['code'] }} {{ $subitem['name'] }}</span>

                                    @if (!empty($subitem['subitems']))
                                        <ol class="list-none pl-6 mt-1.5 space-y-1 text-sm">
                                            @foreach ($subitem['subitems'] as $child)
                                                <li>
                                                    <span class="font-medium">{{ $child['code'] }}</span>
                                                    {{ $child['name'] }}
                                                </li>
                                            @endforeach
                                        </ol>
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>

    {{-- @json($sample) --}}
</div>