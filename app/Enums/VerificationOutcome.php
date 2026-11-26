<?php

namespace App\Enums;

/**
 * Resultado de la verificación de un sistema de control (literal 2.1.c).
 * Un sistema es eficaz (indicador 2.1.c.2) si su última verificación fue conforme.
 */
enum VerificationOutcome: string
{
    case CONFORMING = 'conforming';
    case NONCONFORMING = 'nonconforming';

    public function label(): string
    {
        return match ($this) {
            self::CONFORMING => 'Conforme',
            self::NONCONFORMING => 'Con no conformidades',
        };
    }
}
