<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $company_id
 * @property Company $company
 * @property int $sisat_activity_id
 * @property SisatActivity $activity
 * @property array $results
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['company_id', 'sisat_activity_id', 'results'])]
class SisatResult extends Model
{
    protected function casts()
    {
        return [
            'results' => 'json',
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function activity()
    {
        return $this->belongsTo(SisatActivity::class);
    }
}
