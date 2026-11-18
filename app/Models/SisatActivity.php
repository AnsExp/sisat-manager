<?php

namespace App\Models;

use App\Enums\WorkStaff;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property WorkStaff $responsable
 * @property WorkStaff|null $support
 * @property int $sisat_module_id
 * @property SisatModule $sisatModule
 * @property array $rules
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'slug', 'sisat_module_id', 'rules'])]
class SisatActivity extends Model
{
    protected function casts()
    {
        return [
            'rules' => 'json',
            'support' => WorkStaff::class,
            'responsable' => WorkStaff::class,
        ];
    }

    public function module()
    {
        return $this->belongsTo(SisatModule::class);
    }
}
