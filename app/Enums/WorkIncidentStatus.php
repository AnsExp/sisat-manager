<?php

namespace App\Enums;

use App\Enums\Concerns\StageFlow;

/**
 * Etapas de un caso de AT / EP / incidente en la revisión de datos (literal 1.e).
 *
 * Flujo: registrado → clasificado → analizado.
 */
enum WorkIncidentStatus: string
{
    use StageFlow;

    case REGISTERED = 'registered';
    case CLASSIFIED = 'classified';
    case ANALYZED = 'analyzed';

    public function label(): string
    {
        return match ($this) {
            self::REGISTERED => 'Registrado',
            self::CLASSIFIED => 'Clasificado',
            self::ANALYZED => 'Analizado',
        };
    }

    /**
     * Nombre en plural para los conteos («3 registrados»).
     */
    public function pluralLabel(): string
    {
        return match ($this) {
            self::REGISTERED => 'Registrados',
            self::CLASSIFIED => 'Clasificados',
            self::ANALYZED => 'Analizados',
        };
    }

    /**
     * Texto de ayuda para el detalle que se escribe al llegar a esta etapa.
     */
    public function detailHint(): string
    {
        return match ($this) {
            self::REGISTERED => 'Descripción del suceso',
            self::CLASSIFIED => 'Clasificación del caso (tipo de accidente o enfermedad de la lista OIT)',
            self::ANALYZED => 'Causas, puestos afectados y recomendaciones',
        };
    }
}
