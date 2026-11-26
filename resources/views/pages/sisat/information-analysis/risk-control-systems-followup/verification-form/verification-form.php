<?php

use App\Enums\VerificationOutcome;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatResult;
use App\Support\ControlSystemSchedule;
use Flux\Flux;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

/**
 * Modal de la verificación de un sistema de control en un mes del cronograma.
 *
 * Si el mes no tiene verificación, registra una en results.verifications.{Y-m}
 * (fecha, resultado, no conformidades, evidencia, usuario y timestamp). Si ya la
 * tiene, la muestra y permite eliminarla.
 */
new class extends Component
{
    use WithFileUploads;

    public Company $company;

    public SisatActivity $activity;

    public ?SisatResult $system = null;

    /** Mes de la verificación ('Y-m'). */
    public ?string $month = null;

    public ?string $date = null;

    public ?string $outcome = null;

    public ?string $findings = null;

    public ?TemporaryUploadedFile $document = null;

    public function mount(Company $company, SisatActivity $activity)
    {
        $this->company = $company;
        $this->activity = $activity;
    }

    #[Computed]
    public function schedule(): ?ControlSystemSchedule
    {
        return $this->system ? new ControlSystemSchedule($this->system) : null;
    }

    /**
     * Verificación ya registrada en el mes, o null si hay que registrarla.
     */
    #[Computed]
    public function verification(): ?array
    {
        return $this->schedule?->verification($this->month ?? '');
    }

    #[On('verification-open')]
    public function open(int $id, string $month): void
    {
        $this->resetForm();

        $system = $this->activity->results()->where('company_id', $this->company->id)->find($id);
        $schedule = $system && isset($system->results['system']) ? new ControlSystemSchedule($system) : null;

        if (! $schedule?->state($month)->isOpenable()) {
            Flux::toast('Ese mes no tiene una verificación que se pueda registrar.', variant: 'warning');

            return;
        }

        $this->system = $system;
        $this->month = $month;
        $this->date = min(now()->toDateString(), Date::parse("{$month}-01")->endOfMonth()->toDateString());

        Flux::modal('verification-form')->show();
    }

    protected function rules(): array
    {
        return [
            'date' => ['required', 'date', 'before_or_equal:today', 'after_or_equal:'.($this->month ?? '1900-01').'-01'],
            'outcome' => ['required', Rule::enum(VerificationOutcome::class)],
            'findings' => ['nullable', 'required_if:outcome,'.VerificationOutcome::NONCONFORMING->value, 'string', 'max:2000'],
            'document' => ['nullable', 'file', 'mimetypes:application/pdf', 'max:2048'],
        ];
    }

    protected function validationAttributes(): array
    {
        return [
            'date' => 'fecha de ejecución',
            'outcome' => 'resultado',
            'findings' => 'no conformidades',
            'document' => 'evidencia',
        ];
    }

    protected function messages(): array
    {
        return [
            'findings.required_if' => 'Describa las no conformidades detectadas.',
            'date.after_or_equal' => 'La fecha no puede ser anterior al mes programado.',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $system = $this->system?->fresh();

        // Otra pestaña pudo registrar el mes o eliminar el sistema mientras tanto.
        if (! $system || isset($system->results['verifications'][$this->month])) {
            $this->finish('La verificación ya fue registrada o el sistema ya no existe.', 'warning');

            return;
        }

        $results = $system->results;
        $results['verifications'][$this->month] = [
            'date' => $this->date,
            'outcome' => $this->outcome,
            'findings' => $this->outcome === VerificationOutcome::NONCONFORMING->value ? $this->findings : null,
            'document' => $this->storeDocument($system),
            'at' => now()->toIso8601String(),
            'user_id' => auth()->id(),
        ];

        $system->update(['results' => $results]);

        $this->finish('Verificación registrada.');
    }

    public function remove(): void
    {
        $system = $this->system?->fresh();

        if ($system) {
            $results = $system->results;
            unset($results['verifications'][$this->month]);
            $system->update(['results' => $results]);
        }

        $this->finish('Verificación eliminada.');
    }

    /**
     * @return array{path: string, name: string, sha256: string}|null
     */
    private function storeDocument(SisatResult $system): ?array
    {
        if (! $this->document) {
            return null;
        }

        $content = $this->document->getContent();
        $path = sprintf(
            '%s/%s/%s/%s-%s-%s.pdf',
            $this->activity->module->slug,
            $this->activity->slug,
            $this->company->slug,
            $system->id,
            $this->month,
            uniqid(),
        );

        Storage::disk('local')->put($path, $content);

        return [
            'path' => $path,
            'name' => $this->document->getClientOriginalName(),
            'sha256' => hash('sha256', $content),
        ];
    }

    private function finish(string $message, ?string $variant = null): void
    {
        $this->resetForm();
        $this->dispatch('control-systems-updated');

        Flux::modal('verification-form')->close();
        Flux::toast($message, variant: $variant);
    }

    private function resetForm(): void
    {
        $this->resetValidation();
        $this->reset(['system', 'month', 'date', 'outcome', 'findings', 'document']);
        unset($this->schedule, $this->verification);
    }
};
