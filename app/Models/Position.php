<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property int $workspace_id
 * @property Workspace $workspace
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'workspace_id'])]
class Position extends Model
{
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
