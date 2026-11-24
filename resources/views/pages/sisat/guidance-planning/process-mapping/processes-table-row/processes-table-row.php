<?php

use App\Models\SisatResult;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;

new class extends Component
{
    public SisatResult $result;

    public ?string $sha = null;

    public function mount(SisatResult $result)
    {
        $this->result = $result;
        $this->sha = $result->results['map']['sha256'];
    }

    public function uploadMap()
    {
        $this->dispatch('document-store', idResult: $this->result->id);
    }

    public function download()
    {
        $path = $this->result->results['map']['path'] ?? null;
        $storage = Storage::disk('local');

        if (! $path || ! $storage->exists($path)) {
            Flux::toast('No se encontró el archivo dentro del sistema.');

            return;
        }

        Flux::toast('Se descargó un archivo.');

        return response()->streamDownload(
            function () use ($storage, $path) {
                echo $storage->get($path);
            },
            Str::slug($this->result->results['name'] ?? 'mapa-de-proceso').'.pdf'
        );
    }

    public function destroy()
    {
        $this->result->delete();
        $this->dispatch('processes-update');
    }
};
