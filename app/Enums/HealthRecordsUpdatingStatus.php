<?php

namespace App\Enums;

enum HealthRecordsUpdatingStatus: string
{
    case COMPLETE = 'complete';
    case MISSING = 'missing';

    public function label(): string
    {
        return match ($this) {
            self::COMPLETE => 'Completas',
            self::MISSING => 'Faltan',
            default => 'No definido',
        };
    }
}
