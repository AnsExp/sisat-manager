<?php

use App\Models\Company;
use App\Models\Workspace;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public string $name = '';

    public Company $company;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
        ];
    }

    public function submit()
    {
        Workspace::create([
            'name' => $this->name,
            'company_id' => $this->company->id,
        ]);
        $this->reset();
        Flux::modal('form-workspace')->close();
        $this->dispatch('reload-workspaces');
    }
};
