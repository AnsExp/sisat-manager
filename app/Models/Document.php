<?php

namespace App\Models;

use App\Enums\DocumentType;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property Employee $employee
 * @property string $filename
 * @property string $filepath
 * @property DocumentType $document_type
 * @property string $sha256
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['filename', 'filepath', 'document_type', 'sha256'])]
class Document extends Model
{
    protected function casts()
    {
        return [
            'document_type' => DocumentType::class,
        ];
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
