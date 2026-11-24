<?php

namespace App\Enums;

enum WorkIncidentStatus: string
{
    case REGISTERED = 'registered';
    case ANALYZED = 'analyzed';
    case FINALIZED = 'finalized';

    public function label()
    {
        return match ($this) {
            WorkIncidentStatus::REGISTERED => 'Registrado',
            WorkIncidentStatus::ANALYZED => 'Analizado',
            WorkIncidentStatus::FINALIZED => 'Finalizado',
            default => 'Sin Especificar',
        };
    }
}
