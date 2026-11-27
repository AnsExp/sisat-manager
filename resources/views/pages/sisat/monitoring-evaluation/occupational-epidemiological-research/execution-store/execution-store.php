<?php

use App\Enums\OccupationalEpidemiologicalResearchStatus;
use App\Models\SisatResult;
use Flux\Flux;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public ?SisatResult $result = null;

    public string $date = '';

    public int $participants = 0;

    /**
     * @var array<TemporaryUploadedFile>
     */
    public array $evidence = [];

    #[On('execution-store')]
    public function executionStore(int $result)
    {
        $this->result = SisatResult::find($result);
        Flux::modal('execution-store')->show();
    }

    protected function rules()
    {
        return [
            'evidence' => ['nullable', 'array'],
            'evidence.*' => ['required', 'file'],
            'date' => ['required', 'date'],
            'participants' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function submit()
    {
        $this->validate();

        DB::transaction(function () {

            $storage = Storage::disk('local');
            $filesUploads = [];

            $basePath = "/{$this->result->activity->module->slug}/{$this->result->activity->slug}";

            foreach ($this->evidence as $evidence) {
                $hash = hash('SHA256', $evidence->getContent());
                $path = "$basePath/{$hash}.{$evidence->getClientOriginalExtension()}";
                if ($storage->put($path, $evidence->getContent())) {
                    $filesUploads[] = [
                        'hash' => $hash,
                        'path' => $path,
                        'filename' => $evidence->getClientOriginalName(),
                    ];
                }
            }

            $results = $this->result->results;

            $results['participants'] = $this->participants;
            $results['date_execution'] = $this->date;
            $results['evidence'] = $filesUploads;
            $results['status'] = OccupationalEpidemiologicalResearchStatus::EXECUTED->value;

            $this->result->results = $results;
            $this->result->save();

            Flux::toast('Se ha registrado la actividad');
            Flux::modal('execution-store')->close();
            $this->dispatch("execution-store-{$this->result->id}");
            $this->reset();
            $this->result = null;
        });

    }
};
