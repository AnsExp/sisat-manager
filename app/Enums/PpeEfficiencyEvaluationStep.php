<?php

namespace App\Enums;

use App\Enums\Concerns\StageFlow;

/**
 * Pasos de un ítem de protección (EPP o protección colectiva) en la evaluación de
 * su eficacia (literal 2.1.b).
 *
 * Orden: requerido en la matriz → eficacia evaluada → entregado a expuestos → vigente.
 * Un paso solo puede marcarse si el anterior está marcado, y un ítem cuenta como
 * evaluado y vigente (indicador 2.1.b.1) cuando alcanza el último paso.
 */
enum PpeEfficiencyEvaluationStep: string
{
    use StageFlow;

    case REQUIRED = 'required';
    case EVALUATED = 'evaluated';
    case DELIVERED = 'delivered';
    case CURRENT = 'current';

    public function label(): string
    {
        return match ($this) {
            self::REQUIRED => 'Requerido en matriz',
            self::EVALUATED => 'Eficacia evaluada',
            self::DELIVERED => 'Entregado a expuestos',
            self::CURRENT => 'Vigente',
        };
    }

    /**
     * Nombre para los conteos («3 ítems con eficacia evaluada»).
     */
    public function pluralLabel(): string
    {
        return match ($this) {
            self::REQUIRED => 'Requeridos en matriz',
            self::EVALUATED => 'Con eficacia evaluada',
            self::DELIVERED => 'Entregados a expuestos',
            self::CURRENT => 'Vigentes',
        };
    }
}
