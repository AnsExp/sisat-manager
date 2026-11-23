<?php

use App\Models\CIIU;
use App\Models\Company;
use Flux\Flux;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{

    public ?CIIU $ciiuSelected = null;

    public ?Company $company = null;

    public string $ruc = '';

    public string $ciiu = '';

    public string $name = '';

    public string $email = '';

    public string $address = '';


    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email'],
            'address' => ['nullable', 'string', 'max:255'],
            'ruc' => ['required', Rule::unique('companies', 'ruc')->ignore($this->company)],
            'ciiu' => ['required', Rule::exists('ciius', 'code')],
        ];
    }

    public function updatedCiiu($value)
    {
        $this->ciiuSelected = CIIU::findByCode(strtoupper($value));
    }

    #[On('load-data')]
    public function loadData(?int $id = null)
    {
        if ($id === null) {
            $this->ruc = '';
            $this->name = '';
            $this->email = '';
            $this->address = '';
        } elseif ($this->company = Company::find($id)) {
            $this->ruc = $this->company->ruc;
            $this->name = $this->company->name;
            $this->email = $this->company->email;
            $this->address = $this->company->address;
            $this->ciiuSelected = $this->company->ciiu;
            $this->ciiu = $this->company->ciiu->code;
        }
        Flux::modal('form-store')->show();
    }

    public function submit()
    {
        $this->ciiu = strtoupper($this->ciiu);

        $this->validate();

        if ($this->company) {
            $this->company->update([
                'name' => $this->formData['name'],
                'ruc' => $this->formData['ruc'],
                'address' => $this->formData['address'],
                'email' => $this->formData['email'],
            ]);
            Flux::toast(
                variant: 'success',
                heading: 'Empresa actualizada',
                text: "La empresas {$this->formData['name']} se ha actualizado exitosamente.",
            );
        } else {
            Company::create([
                'name' => $this->formData['name'],
                'ruc' => $this->formData['ruc'],
                'address' => $this->formData['address'],
                'email' => $this->formData['email'],
            ]);
            Flux::toast(
                variant: 'success',
                heading: 'Empresa creada',
                text: "La empresas {$this->formData['name']} se registro exitosamente.",
            );
        }

        $this->dispatch('reload-data');
        Flux::modal('form-store')->close();
    }
};
