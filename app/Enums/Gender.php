<?php

namespace App\Enums;

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    case OTHER = 'other';

    public function label(){
        return match ($this) {
            Gender::MALE => 'Masculino',
            Gender::FEMALE => 'Femenino',
            Gender::OTHER => 'Otro',
            default => 'No especificado',
        };
    }
}
