<?php

namespace App\Models;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $first_name
 * @property string|null $second_first_name
 * @property string $last_name
 * @property string|null $second_last_name
 * @property string $id_card
 * @property string|null $phone
 * @property string|null $email
 * @property Gender|null $gender
 * @property Document[] $documents
 * @property int $company_id
 * @property int $workspace_id
 * @property int $position_id
 * @property Company $company
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
#[Fillable(['first_name', 'second_first_name', 'last_name', 'second_last_name', 'id_card', 'phone', 'email', 'gender', 'company_id', 'workspace_id', 'position_id'])]
class Employee extends Model
{
    public function casts()
    {
        return [
            'gender' => Gender::class,
        ];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function display_name(bool $lastnamesFirst = false)
    {
        if ($lastnamesFirst) {
            return "$this->last_name $this->second_last_name $this->first_name $this->second_first_name";
        }

        return "$this->first_name $this->second_first_name $this->last_name $this->second_last_name";
    }
}
