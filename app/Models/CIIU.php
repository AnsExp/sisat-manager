<?php

namespace App\Models;

use App\Enums\RiskLevel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $code
 * @property string $description
 * @property RiskLevel $level
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'ruc', 'address', 'email'])]
#[Table(name: 'ciius')]
class CIIU extends Model
{
    protected function casts()
    {
        return [
            'level' => RiskLevel::class,
        ];
    }

    public static function findByCode(string $code)
    {
        return self::where('code', $code)->first();
    }
}
