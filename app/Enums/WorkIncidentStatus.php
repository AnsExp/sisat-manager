<?php

namespace App\Enums;

/**
 * Etapas de un caso de AT / EP / incidente en la revisión de datos (literal 1.e).
 *
 * El orden de los casos es el flujo: registrado → clasificado → analizado.
 * Un caso guarda su etapa actual en results.status y los datos de cada etapa
 * alcanzada en results.stages.{etapa}.
 */
enum WorkIncidentStatus: string
{
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

    /**
     * Etapa siguiente, o null si esta es la última.
     */
    public function next(): ?self
    {
        return self::cases()[$this->position() + 1] ?? null;
    }

    public function isLast(): bool
    {
        return $this->next() === null;
    }

    /**
     * Indica si un caso en esta etapa ya pasó por $stage.
     * Ejemplo: un caso analizado alcanzó también registrado y clasificado.
     */
    public function hasReached(self $stage): bool
    {
        return $this->position() >= $stage->position();
    }

    private function position(): int
    {
        return array_search($this, self::cases(), true);
    }
}
