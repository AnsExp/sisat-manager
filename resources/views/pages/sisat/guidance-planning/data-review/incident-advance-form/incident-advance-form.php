<?php

use App\Enums\WorkIncidentStatus;
use App\Models\Company;
use App\Models\SisatResult;
use Flux\Flux;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

/**
 * Modal que hace avanzar un caso a su siguiente etapa.
 *
 * Guarda la etapa nueva en results.stages.{etapa} (fecha, detalle, evidencia,
 * usuario y timestamp) y actualiza results.status. Las etapas anteriores no se tocan.
 */
new class extends Component
{
    use WithFileUploads;

    public Company $company;

    public ?SisatResult $incident = null;

    /** Etapa en la que estaba el caso al abrir el modal. */
    public ?string $from = null;

    /** Etapa a la que pasará el caso. */
    public ?string $to = null;

    public ?string $date = null;

    public ?string $details = null;

    public ?TemporaryUploadedFile $document = null;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    #[Computed]
    public function fromStage(): ?WorkIncidentStatus
    {
        return WorkIncidentStatus::tryFrom($this->from ?? '');
    }

    #[Computed]
    public function toStage(): ?WorkIncidentStatus
    {
        return WorkIncidentStatus::tryFrom($this->to ?? '');
    }

    #[On('incident-advance')]
    public function open(int $id): void
    {
        $this->resetForm();

        $incident = SisatResult::where('company_id', $this->company->id)->find($id);
        $current = WorkIncidentStatus::tryFrom($incident?->results['status'] ?? '');

        if (! $current || $current->isLast()) {
            Flux::toast('El caso no existe o ya está en su última etapa.', variant: 'warning');

            return;
        }

        $this->incident = $incident;
        $this->from = $current->value;
        $this->to = $current->next()->value;
        $this->date = now()->toDateString();

        Flux::modal('incident-advance')->show();
    }

    protected function rules()
    {
        return [
            'date' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:'.($this->incident?->results['date'] ?? '1900-01-01')],
            'details' => ['required', 'string', 'min:3'],
            'document' => ['nullable', 'file', 'mimetypes:application/pdf', 'max:2048'],
        ];
    }

    protected function validationAttributes()
    {
        return [
            'date' => 'fecha',
            'details' => 'detalle',
            'document' => 'evidencia',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $incident = $this->incident?->fresh();

        // El caso pudo moverse en otra pestaña mientras el modal estaba abierto.
        if (($incident?->results['status'] ?? null) !== $this->from) {
            $this->finish('El caso cambió de estado mientras se editaba. Revise el tablero.', 'warning');

            return;
        }

        $results = $incident->results;
        $results['status'] = $this->to;
        $results['stages'][$this->to] = [
            'at' => now()->toIso8601String(),
            'user_id' => auth()->id(),
            'date' => $this->date,
            'details' => $this->details,
            'document' => $this->storeDocument($incident),
        ];

        $incident->update(['results' => $results]);

        $this->finish("Caso #{$incident->id} marcado como {$this->toStage->label()}.");
    }

    /**
     * Guarda la evidencia, si se adjuntó, y devuelve los datos que quedan en la etapa.
     *
     * @return array{path: string, name: string, sha256: string}|null
     */
    private function storeDocument(SisatResult $incident): ?array
    {
        if (! $this->document) {
            return null;
        }

        $activity = $incident->activity;
        $content = $this->document->getContent();
        $path = sprintf(
            '%s/%s/%s/%s-%s-%s.pdf',
            $activity->module->slug,
            $activity->slug,
            $this->company->slug,
            $incident->id,
            $this->to,
            uniqid(),
        );

        Storage::disk('local')->put($path, $content);

        return [
            'path' => $path,
            'name' => $this->document->getClientOriginalName(),
            'sha256' => hash('sha256', $content),
        ];
    }

    /**
     * Cierra el modal, avisa al tablero y muestra el mensaje.
     */
    private function finish(string $message, ?string $variant = null): void
    {
        $this->resetForm();
        $this->dispatch('incidents-updated');

        Flux::modal('incident-advance')->close();
        Flux::toast($message, variant: $variant);
    }

    private function resetForm(): void
    {
        $this->resetValidation();
        $this->reset(['incident', 'from', 'to', 'date', 'details', 'document']);
    }
};
