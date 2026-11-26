<?php

use App\Enums\VerificationFrequency;
use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

/**
 * Modal para agregar un sistema de control al cronograma (2.1.c). Crea el único
 * registro del sistema, todavía sin verificaciones:
 *
 *   results = ['system' => ['name' => …, 'frequency' => 3, 'start' => '2026-01'], 'verifications' => []]
 */
new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public string $name = '';

    public ?int $frequency = null;

    /** Primer mes en que toca verificar ('Y-m'). */
    public string $start = '';

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
        $this->start = now()->format('Y-m');
    }

    protected function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:120',
                function (string $attribute, string $value, Closure $fail) {
                    if ($this->alreadyListed($value)) {
                        $fail('Este sistema de control ya está en la lista.');
                    }
                },
            ],
            'frequency' => ['required', Rule::enum(VerificationFrequency::class)],
            'start' => ['required', 'date_format:Y-m'],
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'name' => 'sistema de control',
            'frequency' => 'frecuencia',
            'start' => 'primera verificación',
        ];
    }

    public function submit(): void
    {
        $this->name = trim($this->name);
        $this->validate();

        $this->activity->results()->create([
            'company_id' => $this->company->id,
            'results' => [
                'system' => [
                    'name' => $this->name,
                    'frequency' => $this->frequency,
                    'start' => $this->start,
                ],
                'verifications' => [],
            ],
        ]);

        $this->reset('name', 'frequency');
        $this->start = now()->format('Y-m');
        $this->dispatch('control-systems-updated');

        Flux::modal('control-system-store')->close();
        Flux::toast(variant: 'success', text: 'Sistema de control agregado al cronograma.');
    }

    private function alreadyListed(string $name): bool
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->pluck('results')
            ->contains(fn ($results) => mb_strtolower($results['system']['name'] ?? '') === mb_strtolower(trim($name)));
    }
};
