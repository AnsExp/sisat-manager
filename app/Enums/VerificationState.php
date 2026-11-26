<?php

namespace App\Enums;

/**
 * Estado de un mes en el cronograma de verificaciones de un sistema de control.
 */
enum VerificationState: string
{
    /** El mes no tiene verificación programada. */
    case NONE = 'none';

    /** Programada y registrada. */
    case DONE = 'done';

    /** Programada en un mes ya pasado y sin registrar. */
    case LATE = 'late';

    /** Programada en el mes en curso y aún sin registrar. */
    case DUE = 'due';

    /** Programada en un mes que todavía no llega. */
    case FUTURE = 'future';

    public function label(): string
    {
        return match ($this) {
            self::NONE => 'Sin verificación',
            self::DONE => 'Ejecutada',
            self::LATE => 'Atrasada',
            self::DUE => 'Pendiente este mes',
            self::FUTURE => 'Programada',
        };
    }

    /**
     * Solo se puede abrir un mes programado que ya llegó.
     */
    public function isOpenable(): bool
    {
        return in_array($this, [self::DONE, self::LATE, self::DUE], true);
    }
}
