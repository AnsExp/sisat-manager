<?php

namespace App\Enums;

enum RiskLevel: string
{
    case LOW = 'low';
    case MEDIUM = 'medium';
    case HIGH = 'high';

    public function label()
    {
        return match ($this) {
            RiskLevel::LOW => 'Bajo',
            RiskLevel::MEDIUM => 'Medio',
            RiskLevel::HIGH => 'Alto',
            default => 'No especificado',
        };
    }
}
