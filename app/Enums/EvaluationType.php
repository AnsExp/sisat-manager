<?php

namespace App\Enums;

enum EvaluationType: string
{
    case INCOME = 'income';
    case NEWSPAPER = 'newspaper';
    case REFOUND = 'refound';
    case WITHDRAWAL = 'withdrawal';

    public function label(){
        return match ($this) {
            EvaluationType::INCOME => 'Ingreso',
            EvaluationType::NEWSPAPER => 'Periódico',
            EvaluationType::REFOUND => 'Reintegro',
            EvaluationType::WITHDRAWAL => 'Retiro',
            default => 'Sin Especificar',
        };
    }
}
