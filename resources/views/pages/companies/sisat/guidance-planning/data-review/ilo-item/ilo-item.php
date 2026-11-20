<?php

use App\Models\Company;
use App\Models\IloItem;
use App\Models\SisatActivity;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public IloItem $item;

    public bool $open = true;

    public bool $checked = false;

    public function mount(Company $company, IloItem $item): void
    {
        $this->company = $company;
        $this->item = $item->loadMissing('children');
        $this->init();
    }

    public function toggleOpen(): void
    {
        $this->open = ! $this->open;
    }

    public function init()
    {
        $activity = $this->dataReviewActivity();

        if (! $activity) {
            $this->checked = false;

            return;
        }

        $existingResult = $this->findResultForItem($activity);

        $this->checked = (bool) ($existingResult?->results['value'] ?? false);
    }

    public function updatedChecked(bool $value): void
    {
        $activity = $this->dataReviewActivity();

        if (! $activity) {
            return;
        }

        $result = $this->findResultForItem($activity);

        if ($result) {
            $rts = $result->results ?? [];
            $rts['item'] = [
                'id' => $this->item->id,
            ];
            $rts['value'] = $value;

            $result->results = $rts;
            $result->save();

            return;
        }

        $activity->results()->create([
            'company_id' => $this->company->id,
            'results' => [
                'item' => [
                    'id' => $this->item->id,
                ],
                'value' => $value,
            ],
        ]);
    }

    private function dataReviewActivity()
    {
        return SisatActivity::findBySlug('data_review');
    }

    private function findResultForItem(SisatActivity $activity)
    {
        return $activity->results()
            ->where('company_id', $this->company->id)
            ->whereRaw("(results->'item'->>'id')::bigint = ?", [$this->item->id])
            ->first();
    }
};
