<?php

use App\Models\SisatActivity;
use App\Models\SisatResult;
use Flux\Flux;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $document = null;

    public SisatActivity $activity;

    public ?SisatResult $result = null;

    public function mount(SisatActivity $activity)
    {
        $this->activity = $activity;
    }

    protected function rules()
    {
        return [
            'document' => ['required', 'file', 'mimetypes:application/pdf'],
        ];
    }

    #[On('document-store')]
    public function documentStore(int $idResult)
    {
        $this->result = SisatResult::find($idResult);
        $this->reset('document');
        $this->resetValidation();
        Flux::modal('document-store')->show();
    }

    public function submit()
    {
        $this->validate();

        if (! $this->result) {
            return;
        }

        DB::transaction(function () {
            $path = sprintf(
                '/%s/%s/%s.%s',
                $this->activity->module->slug,
                $this->activity->slug,
                uniqid(),
                $this->document->getClientOriginalExtension(),
            );
            $storage = Storage::disk('local');
            $storage->put($path, $this->document->getContent());

            $results = $this->result->results;
            $results['map'] = [
                'path' => $path,
                'sha256' => hash('SHA256', $this->document->getContent()),
            ];
            $this->result->results = $results;
            $this->result->save();
        });

        $this->reset('document');
        Flux::toast('Se guardo un nuevo mapa de proceso.');
        $this->dispatch('processes-update');
        Flux::modal('document-store')->close();
    }
};
