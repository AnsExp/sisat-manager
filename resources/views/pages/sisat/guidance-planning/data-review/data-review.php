<?php

use App\Models\Company;
use App\Models\IloItem;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public Collection $items;

    public function mount(Company $company)
    {
        $this->company = $company;
        $this->items = IloItem::where("parent_id", null)->get();
    }
};
