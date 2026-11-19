<?php

namespace App\Enums;

enum WorkAptitude: string
{
    case FIT = 'fit';
    case FIT_UNDER_OBSERVATION = 'fit_under_observation';
    case FIT_WITH_RESTRICTIONS = 'fit_with_restrictions';
    case UNFIT = 'unfit';

    public function label()
    {
        return match ($this) {
            WorkAptitude::FIT => 'Apto',
            WorkAptitude::FIT_UNDER_OBSERVATION => 'Apto en observacion',
            WorkAptitude::FIT_WITH_RESTRICTIONS => 'Apto con restricciones',
            WorkAptitude::UNFIT => 'No apto',
            default => 'Sin Especificar',
        };
    }

    public function description()
    {
        return match ($this) {
            WorkAptitude::FIT => 'El evaluado no presenta patologías ni limitaciones físicas o funcionales que le impidan desempeñar las tareas inherentes al cargo.',
            WorkAptitude::FIT_UNDER_OBSERVATION => 'Presenta hallazgos clínicos que requieren vigilancia médica periódica o estudios complementarios, sin impedir el desempeño de su labor.',
            WorkAptitude::FIT_WITH_RESTRICTIONS => 'Puede desempeñar el cargo bajo restricciones laborales específicas, uso obligatorio de EPP especial o adaptaciones detalladas en la Sección D.',
            WorkAptitude::UNFIT => 'Presenta condiciones de salud incompatibles con las exigencias físicas y factores de riesgo propios del puesto de trabajo.',
            default => 'Sin Especificar',
        };
    }
}
