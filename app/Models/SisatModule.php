<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property SisatActivity[] $activities
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'slug'])]
class SisatModule extends Model
{
    /**
     * @return HasMany<SisatActivity, SisatModule>
     */
    public function activities()
    {
        return $this->hasMany(SisatActivity::class);
    }
}
