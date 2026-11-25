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

    public ?TemporaryUploadedFile $document = null;

    public function mount(Company $company)
    {
        $this->company = $company;
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
        $document = $this->document;
        $uuid = uniqid();
        $path = 'guidance_planning/management_planning/'.$uuid.'.'.$document->getClientOriginalExtension();
        $storage = Storage::disk('local');
        SisatActivity::findBySlug('management_planning')->results()->create([
            'company_id' => $this->company->id,
            'results' => [
                'path' => $path,
                'sha256' => hash('sha256', $document->getContent()),
            ],
        ]);
        $storage->put($path, $document->getContent());
        $this->document = null;
        $this->dispatch('upload-document');
        Flux::modal('document-store')->close();
    }
};
