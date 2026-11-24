<?php

namespace App\Enums;

enum WorkIncidentType: string
{
    case WORK_ACCIDENT = 'work_accident';
    case OCCUPATIONAL_DISEASE = 'occupational_disease';
    case INCIDENT = 'incident';

    public function label(){
        return match ($this) {
            WorkIncidentType::WORK_ACCIDENT => 'Accidente relacionado con el trabajo',
            WorkIncidentType::OCCUPATIONAL_DISEASE => 'Enfermedad ocupacional',
            WorkIncidentType::INCIDENT => 'Incidente',
            default => 'Sin Especificar',
        };
    }
}
