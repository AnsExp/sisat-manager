<?php

namespace App\Enums;

enum HealthRecordsUpdatingResult: string
{
    case COMPLETE = 'complete';
    case INCOMPLETE = 'incomplete';

    public function label(): string
    {
        return match ($this) {
            self::COMPLETE => 'Completo',
            self::INCOMPLETE => 'Incompleto',
            default => 'No definido',
        };
    }
}
