<?php

use App\Enums\ManagementPlanningStatus;
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
 * Modal que hace avanzar un cambio a su siguiente etapa.
 *
 * Guarda la etapa nueva en results.stages.{etapa} (fecha, detalle, evidencia,
 * usuario y timestamp) y actualiza results.status. Las etapas anteriores no se tocan.
 */
new class extends Component
{
    use WithFileUploads;

    public Company $company;

    public ?SisatResult $change = null;

    /** Etapa en la que estaba el cambio al abrir el modal. */
    public ?string $from = null;

    /** Etapa a la que pasará el cambio. */
    public ?string $to = null;

    public ?string $date = null;

    public ?string $details = null;

    public ?TemporaryUploadedFile $document = null;

    public function mount(Company $company)
    {
        $this->company = $company;
    }

    #[Computed]
    public function fromStage(): ?ManagementPlanningStatus
    {
        return ManagementPlanningStatus::tryFrom($this->from ?? '');
    }

    #[Computed]
    public function toStage(): ?ManagementPlanningStatus
    {
        return ManagementPlanningStatus::tryFrom($this->to ?? '');
    }

    #[On('change-advance')]
    public function open(int $id): void
    {
        $this->resetForm();

        $change = SisatResult::where('company_id', $this->company->id)->find($id);
        $current = ManagementPlanningStatus::tryFrom($change?->results['status'] ?? '');

        if (! $current || $current->isLast()) {
            Flux::toast('El cambio no existe o ya está autorizado.', variant: 'warning');

            return;
        }

        $this->change = $change;
        $this->from = $current->value;
        $this->to = $current->next()->value;
        $this->date = now()->toDateString();

        Flux::modal('change-advance')->show();
    }

    protected function rules()
    {
        return [
            'date' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:'.($this->change?->results['date'] ?? '1900-01-01')],
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

        $change = $this->change?->fresh();

        // El cambio pudo moverse en otra pestaña mientras el modal estaba abierto.
        if (($change?->results['status'] ?? null) !== $this->from) {
            $this->finish('El cambio pasó a otra etapa mientras se editaba. Revise el tablero.', 'warning');

            return;
        }

        $results = $change->results;
        $results['status'] = $this->to;
        $results['stages'][$this->to] = [
            'at' => now()->toIso8601String(),
            'user_id' => auth()->id(),
            'date' => $this->date,
            'details' => $this->details,
            'document' => $this->storeDocument($change),
        ];

        $change->update(['results' => $results]);

        $this->finish("Cambio #{$change->id}: {$this->toStage->label()}.");
    }

    /**
     * Guarda la evidencia, si se adjuntó, y devuelve los datos que quedan en la etapa.
     *
     * @return array{path: string, name: string, sha256: string}|null
     */
    private function storeDocument(SisatResult $change): ?array
    {
        if (! $this->document) {
            return null;
        }

        $activity = $change->activity;
        $content = $this->document->getContent();
        $path = sprintf(
            '%s/%s/%s/%s-%s-%s.pdf',
            $activity->module->slug,
            $activity->slug,
            $this->company->slug,
            $change->id,
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
        $this->dispatch('changes-updated');

        Flux::modal('change-advance')->close();
        Flux::toast($message, variant: $variant);
    }

    private function resetForm(): void
    {
        $this->resetValidation();
        $this->reset(['change', 'from', 'to', 'date', 'details', 'document']);
    }
};
