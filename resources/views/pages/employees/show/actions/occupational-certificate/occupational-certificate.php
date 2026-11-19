<?php

use App\Enums\EvaluationType;
use App\Enums\WorkAptitude;
use App\Models\Employee;
use App\Models\SisatActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component
{
    public string $workAptitude = '';

    public string $restrictions = '';

    public string $evaluationType = '';

    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    protected function rules()
    {
        return [
            'restrictions' => ['nullable', 'string'],
            'workAptitude' => ['required', Rule::enum(WorkAptitude::class)],
            'evaluationType' => ['required', Rule::enum(EvaluationType::class)],
        ];
    }

    public function submit()
    {
        $this->validate();

        $pdf = Pdf::loadView(
            'documents.occupational-certificate',
            [
                'employee' => $this->employee,
                'restrictions' => $this->restrictions ?? '',
                'workAptitude' => WorkAptitude::from($this->workAptitude),
                'evaluationType' => EvaluationType::from($this->evaluationType),
                'numberCertificate' => SisatActivity::findBySlug('physical_diagnosis')->results()->count() + 1,
            ]
        )->setPaper('A4', 'portrait');

        Flux::modal('generate-occupational-certificate')->close();
        $this->resetExcept(['employee']);

        return response()->streamDownload(
            fn () => print ($pdf->output()),
            "{$this->employee->id_card}.pdf"
        );
    }
};
