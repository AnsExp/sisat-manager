<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $ciiu_id
 * @property CIIU $ciiu
 * @property string $name
 * @property string $ruc
 * @property string $address
 * @property string $email
 * @property Workspace[] $workspace
 * @property Employee[] $employees
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['name', 'ciiu_id', 'ruc', 'address', 'email'])]
class Company extends Model
{
    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function ciiu()
    {
        return $this->belongsTo(CIIU::class);
    }
}
