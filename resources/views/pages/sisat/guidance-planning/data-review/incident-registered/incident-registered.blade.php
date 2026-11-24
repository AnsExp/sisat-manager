@php
    /**
     * @var App\Models\Company $company
     * @var App\Models\SisatActivity $activity
     */
@endphp

<div>
    <flux:card body="inset" variant="soft">
        <flux:card.header>
            <flux:heading size="lg" level="2">
                {{ App\Enums\WorkIncidentStatus::REGISTERED->label() }}
            </flux:heading>
        </flux:card.header>
        <flux:card.body>
            <div class="space-y-4">
                @foreach ($this->data as $result)
                    <flux:card variant="soft">
                        <flux:card.header>
                            <p class="text-xs text-right">
                                {{ $result->created_at->translatedFormat('d/m/Y') }}
                            </p>
                        </flux:card.header>
                        <flux:card.body>
                            <p class="font-bold text-[9pt]">
                                {{ App\Enums\WorkIncidentType::from($result->results['work_incident'])->label() }}
                            </p>
                            <p class="text-[9pt]">{{ $this->employeeByResult($result)->display_name() }}</p>
                        </flux:card.body>
                        <flux:card.footer>
                            <div class="flex justify-end">
                                <flux:button icon="arrow-right" size="xs" variant="ghost">Clasificado</flux:button>
                            </div>
                        </flux:card.footer>
                    </flux:card>
                @endforeach
            </div>
        </flux:card.body>
    </flux:card>
</div>