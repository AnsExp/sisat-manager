<?php

namespace App\Enums;

use App\Enums\Concerns\StageFlow;

/**
 * Pasos de la línea base de peligros y riesgos de un puesto de trabajo (literal 2.1.a).
 *
 * Orden: peligros identificados → riesgos evaluados → medidas definidas → vigente.
 * Un paso solo puede marcarse si el anterior está marcado, y un puesto cuenta como
 * «con matriz IPER vigente» (indicador 2.1.a.1) cuando alcanza el último paso.
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
            self::EVALUATED => 'Eficacio evaluada',
            self::DELIVERED => 'Entregado a expuestos',
            self::CURRENT => 'Vigente',
        };
    }

    /**
     * Nombre para los conteos («5 puestos con peligros identificados»).
     */
    public function pluralLabel(): string
    {
        return match ($this) {
            self::REQUIRED => 'Requeridos en matriz',
            self::EVALUATED => 'Con eficacion evaluada',
            self::DELIVERED => 'Entregados a expuestos',
            self::CURRENT => 'Vigentes',
        };
    }

    public function previous(): ?self
    {
        $cases = self::cases();

        return $cases[array_search($this, $cases, true) - 1] ?? null;
    }
}
