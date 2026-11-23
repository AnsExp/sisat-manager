<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public ?TemporaryUploadedFile $document = null;

    public Company $company;

    public SisatActivity $activity;

    public string $name = '';

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'document' => ['required', 'file', 'mimetypes:application/pdf', 'max:5120'],
        ];
    }

    public function submit()
    {
        $this->validate();

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
            $this->activity->results()->create([
                'company_id' => $this->company->id,
                'results' => [
                    'path' => $path,
                    'sha256' => hash('SHA256', $this->document->getContent()),
                    'name' => $this->name,
                    'checked' => false,
                ],
            ]);
            Flux::toast('Se subio un archivo.');
            $this->dispatch('processes-update');
            Flux::modal('process-store')->close();
        });

    }
};
