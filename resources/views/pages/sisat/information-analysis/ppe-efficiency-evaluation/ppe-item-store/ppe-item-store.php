<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Livewire\Component;

/**
 * Modal para agregar un ítem de protección (EPP o protección colectiva) a la lista
 * de la empresa. Cada ítem es un único registro que luego avanza por los pasos de
 * PpeEfficiencyEvaluationStep:
 *
 *   results = [
 *     'item'   => ['name' => …],
 *     'status' => null,   // aún sin pasos marcados
 *     'stages' => [],
 *   ]
 */
new class extends Component
{
    public Company $company;

    public SisatActivity $activity;

    public string $name = '';

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
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
                        $fail('Este ítem ya está en la lista.');
                    }
                },
            ],
        ];
    }

    protected function validationAttributes(): array
    {
        return ['name' => 'EPP / protección'];
    }

    public function submit(): void
    {
        $this->name = trim($this->name);
        $this->validate();

        $this->activity->results()->create([
            'company_id' => $this->company->id,
            'results' => [
                'item' => ['name' => $this->name],
                'status' => null,
                'stages' => [],
            ],
        ]);

        $this->reset('name');
        $this->dispatch('ppe-items-updated');

        Flux::modal('ppe-item-store')->close();
        Flux::toast(variant: 'success', text: 'Ítem agregado a la lista.');
    }

    private function alreadyListed(string $name): bool
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->pluck('results')
            ->contains(fn ($results) => mb_strtolower($results['item']['name'] ?? '') === mb_strtolower(trim($name)));
    }
};
