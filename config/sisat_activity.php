<?php

use App\Enums\WorkStaff;

return [
    [
        'module' => 'Orientación y Planificación',
        'activities' => [
            'a1' => [
                'code' => 'mapping',
                'label' => 'Mapeo de procesos de la actividad laboral, métodos de trabajo (procedimientos).',
                'personal' => [
                    'responsable' => WorkStaff::SECURITY_MONITOR,
                    'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                ],
            ],
        ],
    ],
];
