<?php

use App\Models\Company;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

new #[Title('Empresas')] class extends Component {

    use WithPagination;

    #[On('reload-data')]
    public function reloadData()
    {
        $this->resetPage();
    }

    #[Computed]
    public function data()
    {
        return Company::paginate(10);
    }
};