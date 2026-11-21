<?php

use App\Enums\EvaluationType;
use App\Models\Employee;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public string $evaluationType = '';

    public ?TemporaryUploadedFile $document = null;

    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    protected function rules()
    {
        return [
            'document' => ['required', File::types(['pdf'])],
            'evaluationType' => ['required', Rule::enum(EvaluationType::class)],
        ];
    }

    public function submit()
    {
        $this->validate();

        $path = sprintf(
            'guidance_planning/physical_diagnosis/%s.%s',
            uniqid(),
            $this->document->extension(),
        );

        Storage::disk('local')->put($path, $this->document->getContent());

        SisatActivity::findBySlug('physical_diagnosis')->results()->create([
            'company_id' => $this->employee->company_id,
            'results' => [
                'employee' => [
                    'id' => $this->employee->id,
                ],
                'path' => $path,
                'sha256' => hash('sha256', $this->document->getContent()),
            ],
        ]);

        $this->document = null;
        $this->dispatch('upload-document');
        Flux::modal('upload-certificate')->close();
    }
};
