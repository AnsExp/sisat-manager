<?php

namespace App\Enums;

enum ManagementPlanningType: string
{
    case NEW_MACHINE = 'new_machine';
    case NEW_WORK_METHOD = 'new_work_method';
    case NEW_SERVICE = 'new_service';
    case ADDITION_OF_PERSONAL = 'addition_of_personnel';

    public function label(): string
    {
        return match ($this) {
            self::NEW_MACHINE => 'Nueva máquina',
            self::NEW_WORK_METHOD => 'Nuevo método de trabajo',
            self::NEW_SERVICE => 'Nuevo servicio',
            self::ADDITION_OF_PERSONAL => 'Incorporación de personal',
            default => 'No definido',
        };
    }
}
