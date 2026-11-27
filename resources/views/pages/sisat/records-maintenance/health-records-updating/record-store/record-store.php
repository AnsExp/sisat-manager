<?php

use App\Enums\HealthRecordsUpdatingResult;
use App\Enums\HealthRecordsUpdatingStatus;
use App\Models\Company;
use App\Models\Employee;
use App\Models\SisatActivity;
use Flux\Flux;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public Company $company;

    public SisatActivity $activity;

    public ?Employee $employee = null;

    public ?string $date = null;

    public ?string $evaluations = null;

    public ?string $exams = null;

    public ?string $result = null;

    public ?string $observations = null;

    /**
     * @var array<TemporaryUploadedFile>
     */
    public array $evidences;

    public function mount(SisatActivity $activity, Company $company)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    #[On('record-store')]
    public function recordStore(int $employee)
    {
        if ($this->employee = Employee::find($employee)) {
            Flux::modal('record-store')->show();
        }
    }

    protected function rules()
    {
        return [
            'date' => ['required', 'date'],
            'evaluations' => ['required', Rule::enum(HealthRecordsUpdatingStatus::class)],
            'exams' => ['required', Rule::enum(HealthRecordsUpdatingStatus::class)],
            'result' => ['required', Rule::enum(HealthRecordsUpdatingResult::class)],
            'observations' => ['nullable', 'string'],
            'evidences' => ['nullable', 'array'],
            'evidences.*' => ['required', 'file', 'max:2048'],
        ];
    }

    public function submit()
    {
        $this->validate();

        DB::transaction(function () {

            $evidences = [];
            $storage = Storage::disk('local');
            $basePath = "\\{$this->activity->module->slug}\\{$this->activity->slug}";

            foreach ($this->evidences as $evidence) {
                $hash = hash('SHA256', $evidence->getContent());
                $path = "{$basePath}\\{$hash}.{$evidence->getClientOriginalExtension()}";
                if ($storage->put($path, $evidence->getContent())) {
                    $evidences[] = [
                        'hash' => $hash,
                        'path' => $path,
                        'filename' => $evidence->getClientOriginalName(),
                    ];
                }
            }

            $this->activity->results()->create([
                'company_id' => $this->company->id,
                'results' => [
                    'employee' => [
                        'id' => $this->employee->id,
                    ],
                    'date' => $this->date,
                    'evaluations' => $this->evaluations,
                    'exams' => $this->exams,
                    'result' => $this->result,
                    'observations' => $this->observations,
                    'evidences' => $evidences,
                ],
            ]);

            $this->dispatch("record-update-{$this->employee->id}");
            $this->resetExcept('company', 'activity');
            Flux::toast('Se ha registrado un record de salud');
            Flux::modal('record-store')->close();

        });
    }
};
