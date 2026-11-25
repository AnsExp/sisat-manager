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
enum WorkHazardBaselineStep: string
{
    use StageFlow;

    case IDENTIFIED = 'identified';
    case EVALUATED = 'evaluated';
    case CONTROLS_DEFINED = 'controls_defined';
    case CURRENT = 'current';

    public function label(): string
    {
        return match ($this) {
            self::IDENTIFIED => 'Peligros identificados',
            self::EVALUATED => 'Riesgos evaluados',
            self::CONTROLS_DEFINED => 'Medidas definidas',
            self::CURRENT => 'Vigente',
        };
    }

    /**
     * Nombre para los conteos («5 puestos con peligros identificados»).
     */
    public function pluralLabel(): string
    {
        return match ($this) {
            self::IDENTIFIED => 'Con peligros identificados',
            self::EVALUATED => 'Con riesgos evaluados',
            self::CONTROLS_DEFINED => 'Con medidas definidas',
            self::CURRENT => 'Con línea base vigente',
        };
    }

    public function previous(): ?self
    {
        $cases = self::cases();

        return $cases[array_search($this, $cases, true) - 1] ?? null;
    }
}
