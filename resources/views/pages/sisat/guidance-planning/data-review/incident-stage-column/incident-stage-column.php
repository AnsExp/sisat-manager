<?php

use App\Enums\WorkIncidentStatus;
use App\Models\Company;
use App\Models\Employee;
use App\Models\SisatActivity;
use App\Models\SisatResult;
use Carbon\CarbonInterface;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Columna del tablero: lista los casos que están en una etapa.
 * La página la usa una vez por cada etapa de WorkIncidentStatus.
 */
new class extends Component
{
    use WithPagination;

    public Company $company;

    public SisatActivity $activity;

    public string $status;

    public function mount(SisatActivity $activity, Company $company, string $status)
    {
        $this->company = $company;
        $this->activity = $activity;
        $this->status = WorkIncidentStatus::from($status)->value;
    }

    #[Computed]
    public function stage(): WorkIncidentStatus
    {
        return WorkIncidentStatus::from($this->status);
    }

    /** Casos por página en cada columna. */
    private const PER_PAGE = 5;

    /**
     * Casos de la etapa, del registrado más reciente al más antiguo.
     * El orden depende solo de la fecha de registro, así que un caso no cambia
     * de posición por editarse o moverse de etapa.
     */
    #[Computed]
    public function incidents()
    {
        return $this->activity
            ->results()
            ->where('company_id', $this->company->id)
            ->where('results->status', $this->status)
            ->latest()
            ->latest('id')
            ->paginate(self::PER_PAGE, pageName: $this->pageName());
    }

    /**
     * Cada columna pagina por separado (?page-registered=2, ?page-classified=1…).
     */
    private function pageName(): string
    {
        return "page-{$this->status}";
    }

    /**
     * Trabajadores de los casos de la página, indexados por id (una sola consulta).
     */
    #[Computed]
    public function employees()
    {
        $ids = $this->incidents->pluck('results.employee.id')->filter()->unique();

        return Employee::whereIn('id', $ids)->get()->keyBy('id');
    }

    #[On('incidents-updated')]
    public function reloadIncidents(): void
    {
        unset($this->incidents, $this->employees);

        // Si el último caso de la página pasó a otra etapa, la página quedó vacía:
        // volver a la última página que tenga casos.
        $lastPage = $this->incidents->lastPage();

        if ($this->incidents->currentPage() > $lastPage) {
            $this->setPage($lastPage, $this->pageName());
            unset($this->incidents, $this->employees);
        }
    }

    public function advance(int $id): void
    {
        $this->dispatch('incident-advance', id: $id);
    }

    public function employeeOf(SisatResult $incident): ?Employee
    {
        return $this->employees->get($incident->results['employee']['id'] ?? null);
    }

    /**
     * Cuándo alcanzó el caso la etapa. Los casos creados antes de guardar
     * las etapas no tienen ese dato: para ellos el registro es created_at.
     */
    public function reachedAt(SisatResult $incident, WorkIncidentStatus $stage): ?CarbonInterface
    {
        return $incident->stageAt($stage->value)
            ?? ($stage === WorkIncidentStatus::REGISTERED ? $incident->created_at : null);
    }
};
