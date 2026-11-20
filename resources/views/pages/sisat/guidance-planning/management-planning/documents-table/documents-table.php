<?php

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatResult;
use Flux\Flux;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public Company $company;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    #[Computed]
    #[On('upload-document')]
    public function data()
    {
        return SisatActivity::findBySlug('management_planning')
            ->results()
            ->where('company_id', $this->company->id)
            ->orderBy('created_at','desc')
            ->paginate(10);
    }

    public function download(int $idResult)
    {
        $result = SisatResult::find($idResult);
        $path = $result->results['path'];
        $storage = Storage::disk('local');
        if (!$storage->exists($path)) {
            Flux::toast('No se encontró el archivo dentro del sistema.');
            return;
        }
        Flux::toast('Se descargó un archivo.');
        return response()->streamDownload(
            function () use ($storage, $path): void {
                echo $storage->get($path);
            },
            "document.pdf"
        );
    }
};
