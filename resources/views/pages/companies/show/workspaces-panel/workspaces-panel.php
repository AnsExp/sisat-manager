<?php

use App\Models\Company;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    public function delimitData(string $filter, int $value)
    {
        $this->dispatch('delimit-data', $filter, $value);
    }
};
