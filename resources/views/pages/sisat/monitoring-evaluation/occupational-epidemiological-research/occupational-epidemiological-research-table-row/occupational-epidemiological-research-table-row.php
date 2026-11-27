<?php

use App\Enums\OccupationalEpidemiologicalResearchStatus;
use App\Models\SisatResult;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public SisatResult $result;

    public string $statusColor = 'default';

    public string $displayStatus = 'Programado';

    public string $displayMonth = 'Enero';

    public ?int $participants = null;

    public ?int $evidence = null;

    public function mount(SisatResult $result)
    {
        $this->result = $result;
        $this->calculateStatus();
    }

    #[On('execution-store-{result.id}')]
    public function calculateStatus()
    {
        $this->statusColor = OccupationalEpidemiologicalResearchStatus::from($this->result->results['status']) === OccupationalEpidemiologicalResearchStatus::EXECUTED ? 'green' : 'default';
        $this->displayStatus = OccupationalEpidemiologicalResearchStatus::from($this->result->results['status'])->label();
        $this->displayMonth = ucfirst(Carbon::createFromFormat('Y-m', $this->result->results['month'])->monthName);
        $this->evidence = count($this->result->results['evidence']);
        $this->participants = $this->result->results['participants'];
    }

    public function isExecuted()
    {
        return $this->result->results['status'] === OccupationalEpidemiologicalResearchStatus::EXECUTED->value;
    }

    public function download()
    {
        $evidence = $this->result->results['evidence'] ?? [];
        $storage = Storage::disk('local');

        $tempDir = storage_path('app/temp-zips');
        if (! is_dir($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        $zipName = $this->result->results['activity'].' (evidence).zip';
        $zipPath = $tempDir.DIRECTORY_SEPARATOR.Str::uuid().'-'.$zipName;

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            throw new RuntimeException('No se pudo crear el archivo ZIP temporal.');
        }

        $addedFiles = 0;

        foreach ($evidence as $index => $ev) {
            $relativePath = ltrim($ev['path'] ?? '', '/\\');
            $exists = $relativePath !== '' && $storage->exists($relativePath);

            if (! $exists) {
                continue;
            }

            $absolutePath = $storage->path($relativePath);
            if (! is_file($absolutePath)) {
                continue;
            }

            $originalName = $ev['filename'] ?? $ev['name'] ?? basename($relativePath);
            $entryName = $this->uniqueZipEntryName($originalName, $index);

            $zip->addFile($absolutePath, $entryName);
            $addedFiles++;
        }

        $zip->close();

        if ($addedFiles === 0) {
            @unlink($zipPath);
            throw new RuntimeException('No se encontraron evidencias válidas para incluir en el ZIP.');
        }

        return response()
            ->download($zipPath, $zipName)
            ->deleteFileAfterSend(true);
    }

    private function uniqueZipEntryName(string $name, int $index): string
    {
        $clean = str_replace(['\\', '/'], '_', $name);
        $ext = pathinfo($clean, PATHINFO_EXTENSION);
        $base = pathinfo($clean, PATHINFO_FILENAME) ?: 'evidencia';

        return $ext !== ''
            ? "{$base}-{$index}.{$ext}"
            : "{$base}-{$index}";
    }
};
