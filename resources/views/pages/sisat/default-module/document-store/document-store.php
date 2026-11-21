<?php

use App\Models\Company;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public Company $company;

    public SisatActivity $activity;

    public ?TemporaryUploadedFile $document = null;

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    protected function rules()
    {
        return [
            'document' => ['required', 'file', 'max:2048'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $path = sprintf(
            '%s/%s/%s.%s',
            $this->activity->module->slug,
            $this->activity->slug,
            uniqid(),
            $this->document->extension(),
        );

        $this->activity->results()->create([
            'company_id' => $this->company->id,
            'results' => [
                'path' => $path,
                'sha256' => hash('sha256', $this->document->getContent()),
            ],
        ]);

        Storage::disk('local')->put($path, $this->document->getContent());

        $this->document = null;
        $this->dispatch('upload-document');

        Flux::modal('document-store')->close();
    }
};
