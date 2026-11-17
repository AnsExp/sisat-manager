<?php

namespace App\Enums;

enum WorkStaff: string
{
    case PROFESSIONAL_MEDICAL = 'profesional_medical';
    case SECURITY_MONITOR = 'security_monitor';

    public function label(){
        return match ($this) {
            WorkStaff::PROFESSIONAL_MEDICAL => 'Profesionales de la salud',
            WorkStaff::SECURITY_MONITOR => 'Monitor o técnico de seguridad e higiene del trabajo',
            default => 'Sin Especificar',
        };
    }
}
