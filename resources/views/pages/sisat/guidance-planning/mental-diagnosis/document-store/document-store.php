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

    public SisatActivity $activity;

    public function mount(SisatActivity $activity)
    {
        $this->activity = $activity;
    }

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
        $path = sprintf(
            '/%s/%s/%s.%s',
            $this->activity->module->slug,
            $this->activity->slug,
            uniqid(),
            $this->document->extension(),
        );
        $storage = Storage::disk('local');
        $storage->put($path, $this->document->getContent());
        $this->document = null;
        $this->activity->results()->create([
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
