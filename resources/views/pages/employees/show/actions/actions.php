<?php

use App\Enums\DocumentType;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Flux\Flux;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component {

    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function submitGenerateDocuments()
    {
    }

    public function downloadConfidentialityAgreement()
    {
        $pdf = Pdf::loadView(
            'documents.confidentiality-agreement',
            ['employee' => $this->employee,]
        );

        return response()->streamDownload(
            fn() => print ($pdf->output()),
            "{$this->employee->id_card}.pdf"
        );
    }

    public function downloadTreatmentAuthorization()
    {
        $pdf = Pdf::loadView(
            'documents.treatment-authorization',
            ['employee' => $this->employee,]
        );

        return response()->streamDownload(
            fn() => print ($pdf->output()),
            "{$this->employee->id_card}.pdf"
        );
    }
};