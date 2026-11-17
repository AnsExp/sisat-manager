<?php

use App\Enums\DocumentType;
use App\Models\Employee;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component {

    use WithFileUploads;

    public string $documentType = '';
    public TemporaryUploadedFile|null $document = null;

    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    protected function rules()
    {
        return [
            'document' => ['required', File::types(['pdf'])],
            'documentType' => ['required', Rule::enum(DocumentType::class)],
        ];
    }

    public function submit()
    {
        $this->validate();

        $now = now();

        $path = sprintf(
            '/%s/%s/%s/%s/%s.%s',
            $now->format('Y'),
            $now->format('m'),
            $this->documentType,
            $this->employee->id_card,
            uniqid(),
            $this->document->extension(),
        );

        $this->employee->documents()->create([
            'filename' => $this->document->getBasename(),
            'filepath' => $path,
            'document_type' => $this->documentType,
            'sha256' => hash('sha256', $this->document->getContent()),
        ]);

        Storage::disk('local')->put($path, $this->document->getContent());

        $this->document = null;
        Flux::modal('upload-certificate')->close();
    }
};
