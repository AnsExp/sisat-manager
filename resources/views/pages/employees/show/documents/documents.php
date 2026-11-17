<?php

use App\Models\Employee;
use Flux\Flux;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component {

    use WithPagination;

    public string $filter = 'all';
    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    #[Computed]
    public function data()
    {
        $query = $this->employee->documents()->getQuery();
        if ($this->filter !== 'all') {
            $query->where('document_type', $this->filter);
        }
        return $query->paginate(10);
    }

    public function download(string $path)
    {
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
            "{$this->employee->id_card}.pdf"
        );
    }
};