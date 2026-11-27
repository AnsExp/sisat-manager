<?php

namespace App\Enums;

enum OccupationalEpidemiologicalResearchStatus: string
{
    case PROGRAMMED = 'programmed';
    case EXECUTED = 'executed';

    public function label(): string
    {
        return match ($this) {
            self::PROGRAMMED => 'Programado',
            self::EXECUTED => 'Ejecutado',
            default => 'No especificado',
        };
    }
}
