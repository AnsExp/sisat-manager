<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $index
 * @property string $name
 * @property int|null $parent_id
 * @property IloItem!null $parent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['index', 'name', 'parent_id'])]
class IloItem extends Model
{
    public function parent()
    {
        return $this->belongsTo(IloItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(IloItem::class, 'parent_id');
    }
}
