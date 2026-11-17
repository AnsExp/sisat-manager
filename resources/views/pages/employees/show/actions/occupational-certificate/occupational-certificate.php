<?php

use App\Enums\ConclutionType;
use App\Enums\EvaluationType;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use Livewire\Component;

new class extends Component {

    /**
     * @var array<string>
     */
    public array $recommendations = [];
    public string $conclution = '';
    public string $conclutionDetails = '';
    public string $evaluationType = '';

    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function addRecommendation(): void
    {
        $this->recommendations[] = '';
    }

    public function removeRecommendation(int $index): void
    {
        array_splice($this->recommendations, $index, 1);
    }

    protected function rules()
    {
        return [
            'evaluationType' => ['required', Rule::enum(EvaluationType::class)],
            'conclution' => ['required', Rule::enum(ConclutionType::class)],
            'conclutionDetails' => ['nullable', 'string'],
            'recommendations' => ['nullable', 'array'],
            'recommendations.*' => ['required', 'string'],
        ];
    }

    public function submit()
    {
        $this->validate();

        $pdf = Pdf::loadView(
            'documents.occupational-certificate',
            [
                'employee' => $this->employee,
                'conclutionType' => ConclutionType::from($this->conclution),
                'conclutionDetails' => $this->conclutionDetails,
                'evaluationType' => EvaluationType::from($this->evaluationType),
                'recommendations' => $this->recommendations,
            ]
        )->setPaper('A4', 'landscape');

        return response()->streamDownload(
            fn() => print ($pdf->output()),
            "{$this->employee->id_card}.pdf"
        );
    }
};