<?php

namespace App\Enums;

use App\Enums\Concerns\StageFlow;

/**
 * Etapas de un cambio en la planificación de la gestión preventiva (literal 1.f).
 *
 * Flujo: solicitado → evaluado → medidas definidas → autorizado.
 * Un cambio (nueva máquina, método, servicio o personal) solo debe iniciar cuando
 * está autorizado, es decir, después de evaluar sus riesgos para la salud.
 */
enum ManagementPlanningStatus: string
{
    use StageFlow;

    case REQUESTED = 'requested';
    case EVALUATED = 'evaluated';
    case MEASURES_DEFINED = 'measures_defined';
    case AUTHORIZED = 'authorized';

    public function label(): string
    {
        return match ($this) {
            self::REQUESTED => 'Solicitado',
            self::EVALUATED => 'Evaluado',
            self::MEASURES_DEFINED => 'Medidas definidas',
            self::AUTHORIZED => 'Autorizado',
        };
    }

    /**
     * Nombre en plural para los conteos («3 solicitados», «2 con medidas definidas»).
     */
    public function pluralLabel(): string
    {
        return match ($this) {
            self::REQUESTED => 'Solicitados',
            self::EVALUATED => 'Evaluados',
            self::MEASURES_DEFINED => 'Con medidas definidas',
            self::AUTHORIZED => 'Autorizados',
        };
    }

    /**
     * Texto de ayuda para el detalle que se escribe al llegar a esta etapa.
     */
    public function detailHint(): string
    {
        return match ($this) {
            self::REQUESTED => 'Descripción del cambio',
            self::EVALUATED => 'Riesgos para la salud identificados en el cambio',
            self::MEASURES_DEFINED => 'Medidas preventivas y responsables',
            self::AUTHORIZED => 'Condiciones de la autorización de inicio',
        };
    }
}
