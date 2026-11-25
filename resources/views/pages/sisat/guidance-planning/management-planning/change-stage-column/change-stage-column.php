<?php

use App\Enums\ManagementPlanningStatus;
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
 * Columna del tablero: lista los cambios que están en una etapa.
 * La página la usa una vez por cada etapa de ManagementPlanningStatus.
 */
new class extends Component
{
    use WithPagination;

    /** Cambios por página en cada columna. */
    private const PER_PAGE = 5;

    public Company $company;

    public SisatActivity $activity;

    public string $status;

    public function mount(SisatActivity $activity, Company $company, string $status)
    {
        $this->company = $company;
        $this->activity = $activity;
        $this->status = ManagementPlanningStatus::from($status)->value;
    }

    #[Computed]
    public function stage(): ManagementPlanningStatus
    {
        return ManagementPlanningStatus::from($this->status);
    }

    /**
     * Cambios de la etapa, del solicitado más reciente al más antiguo.
     * El orden depende solo de la fecha de registro, así que un cambio no
     * cambia de posición por editarse o moverse de etapa.
     */
    #[Computed]
    public function changes()
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
     * Trabajadores de los cambios de la página, indexados por id (una sola consulta).
     */
    #[Computed]
    public function employees()
    {
        $ids = $this->changes->pluck('results.employee.id')->filter()->unique();

        return Employee::whereIn('id', $ids)->get()->keyBy('id');
    }

    #[On('changes-updated')]
    public function reloadChanges(): void
    {
        unset($this->changes, $this->employees);

        // Si el último cambio de la página pasó a otra etapa, la página quedó vacía:
        // volver a la última página que tenga cambios.
        $lastPage = $this->changes->lastPage();

        if ($this->changes->currentPage() > $lastPage) {
            $this->setPage($lastPage, $this->pageName());
            unset($this->changes, $this->employees);
        }
    }

    public function advance(int $id): void
    {
        $this->dispatch('change-advance', id: $id);
    }

    public function employeeOf(SisatResult $change): ?Employee
    {
        return $this->employees->get($change->results['employee']['id'] ?? null);
    }

    /**
     * Cuándo alcanzó el cambio la etapa. Si el registro no guardó la primera
     * etapa, se toma created_at como fecha de solicitud.
     */
    public function reachedAt(SisatResult $change, ManagementPlanningStatus $stage): ?CarbonInterface
    {
        return $change->stageAt($stage->value)
            ?? ($stage->isFirst() ? $change->created_at : null);
    }

    /**
     * Cada columna pagina por separado (?page-requested=2, ?page-evaluated=1…).
     */
    private function pageName(): string
    {
        return "page-{$this->status}";
    }
};
