<?php

use App\Models\SisatResult;
use Flux\Flux;
use Livewire\Component;

new class extends Component
{
    public SisatResult $result;

    public string $sha;

    public bool $isChecked;

    public function mount(SisatResult $result)
    {
        $this->result = $result;
        $this->sha = $result->results['sha256'];
        $this->isChecked = (bool) $result->results['checked'];
    }

    public function updatedIsChecked(bool $value)
    {
        $results = $this->result->results;
        $results['checked'] = (bool) $value;
        $this->result->results = $results;
        $this->result->save();
    }

    public function download()
    {
        $path = $this->result->results['path'];
        $storage = Storage::disk('local');

        if (! $storage->exists($path)) {
            Flux::toast('No se encontró el archivo dentro del sistema.');

            return;
        }

        Flux::toast('Se descargó un archivo.');

        return response()->streamDownload(
            function () use ($storage, $path) {
                echo $storage->get($path);
            },
            'document.pdf'
        );
    }

    public function destroy()
    {
        $this->result->delete();
        $this->dispatch('processes-update');
    }
};
