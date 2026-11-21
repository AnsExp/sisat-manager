<?php

use App\Models\Employee;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public Employee $employee;

    public ?TemporaryUploadedFile $document = null;

    #[On('document-store')]
    public function documentStore(int $employeeId)
    {
        $this->employee = Employee::find($employeeId);
        Flux::modal('document-store')->show();
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
        $path = 'guidance_planning/general_diagnosis/'.$uuid.'.'.$document->getClientOriginalExtension();
        $storage = Storage::disk('local');
        $storage->put($path, $document->getContent());
        $this->document = null;
        SisatActivity::findBySlug('general_diagnosis')->results()->create([
            'company_id' => $this->employee->company_id,
            'results' => [
                'employee' => [
                    'id' => $this->employee->id,
                ],
                'path' => $path,
            ],
        ]);
        $this->dispatch('upload-document');
        Flux::modal('document-store')->close();
    }
};
