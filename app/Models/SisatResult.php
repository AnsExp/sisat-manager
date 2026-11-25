<?php

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

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
        return $this->belongsTo(SisatActivity::class, 'sisat_activity_id');
    }

    /**
     * Datos guardados de una etapa del flujo (results.stages.{stage}), o null si no la alcanzó.
     */
    public function stage(string $stage): ?array
    {
        return $this->results['stages'][$stage] ?? null;
    }

    /**
     * Momento en que el registro alcanzó la etapa indicada.
     */
    public function stageAt(string $stage): ?CarbonInterface
    {
        $at = $this->stage($stage)['at'] ?? null;

        return $at ? Date::parse($at) : null;
    }
}
