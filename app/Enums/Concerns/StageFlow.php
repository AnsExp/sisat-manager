<?php

namespace App\Enums\Concerns;

/**
 * Flujo lineal de etapas para enums de estado.
 *
 * El orden en que se declaran los casos del enum es el orden del flujo.
 * Lo usan los tableros por etapas (revisión de datos, gestión del cambio…), donde
 * cada registro guarda su etapa actual en results.status y los datos de cada etapa
 * alcanzada en results.stages.{etapa}.
 */
trait StageFlow
{
    /**
     * Etapa siguiente, o null si esta es la última.
     */
    public function next(): ?self
    {
        return self::cases()[$this->position() + 1] ?? null;
    }

    public function isFirst(): bool
    {
        return $this->position() === 0;
    }

    public function isLast(): bool
    {
        return $this->next() === null;
    }

    /**
     * Indica si un registro en esta etapa ya pasó por $stage.
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
