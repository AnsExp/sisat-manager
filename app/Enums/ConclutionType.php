<?php

namespace App\Enums;

enum ConclutionType: string
{
    case FIT = 'fit';
    case FIT_UNDER_OBSERVATION = 'fit_under_observation';
    case FIT_WITH_LIMITATIONS = 'fit_with_limitations';
    case NO_FIT = 'no_fit';

    public function label(){
        return match ($this) {
            ConclutionType::FIT => 'Apto',
            ConclutionType::FIT_UNDER_OBSERVATION => 'Apto en observación',
            ConclutionType::FIT_WITH_LIMITATIONS => 'Apto con limitaciones',
            ConclutionType::NO_FIT => 'No apto',
            default => 'Sin Especificar',
        };
    }
}
