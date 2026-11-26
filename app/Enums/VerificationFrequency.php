<?php

namespace App\Enums;

/**
 * Cada cuántos meses se verifica un sistema de control (literal 2.1.c).
 */
enum VerificationFrequency: int
{
    case MONTHLY = 1;
    case BIMONTHLY = 2;
    case QUARTERLY = 3;
    case SEMIANNUAL = 6;
    case ANNUAL = 12;

    public function label(): string
    {
        return match ($this) {
            self::MONTHLY => 'Mensual',
            self::BIMONTHLY => 'Bimestral',
            self::QUARTERLY => 'Trimestral',
            self::SEMIANNUAL => 'Semestral',
            self::ANNUAL => 'Anual',
        };
    }
}
