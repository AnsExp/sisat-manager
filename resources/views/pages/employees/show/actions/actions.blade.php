@php
/**
* @var Livewire\Features\SupportFileUploads\TemporaryUploadedFile $certificateFiles
*/
@endphp

<div>
    <flux:card variant="filled">
        <div class="grid gap-2 lg:grid-cols-4">
            <flux:modal.trigger name="generate-occupational-certificate">
                <flux:button>
                    Generar certificado ocupacional
                </flux:button>
            </flux:modal.trigger>
            <flux:button wire:click="downloadTreatmentAuthorization">
                Descargar autorización de tratamiento
            </flux:button>
            <flux:button wire:click="downloadConfidentialityAgreement">
                Descargar acuerdo de confidencialidad
            </flux:button>
            <flux:modal.trigger name="upload-certificate">
                <flux:button>
                    Subir documento
                </flux:button>
            </flux:modal.trigger>
        </div>
    </flux:card>

    <livewire:pages::employees.show.actions.upload-certificate :employee="$employee" />

    <livewire:pages::employees.show.actions.occupational-certificate :employee="$employee" />

</div>