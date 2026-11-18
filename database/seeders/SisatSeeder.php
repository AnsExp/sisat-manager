<?php

namespace Database\Seeders;

use App\Enums\RiskLevel;
use App\Enums\WorkStaff;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Illuminate\Database\Seeder;

class SisatSeeder extends Seeder
{
    private $SISAT_DATA = [
        /*
    |--------------------------------------------------------------------------
    | 1. ORIENTACIÓN Y PLANIFICACIÓN
    |--------------------------------------------------------------------------
    */
        'guidance_planning' => [
            'name' => '1. Orientación y Planificación',
            'activities' => [
                'process_mapping' => [
                    'label' => 'Mapeo de procesos de la actividad laboral, métodos de trabajo (procedimientos)',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'general_diagnosis' => [
                    'label' => 'Diagnóstico general de salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'physical_diagnosis' => [
                    'label' => 'Diagnóstico de salud física del trabajador',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'mental_diagnosis' => [
                    'label' => 'Diagnóstico de salud mental del trabajador',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'data_review' => [
                    'label' => 'Revisión de los datos disponibles de enfermedades profesionales y accidentes',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'management_planning' => [
                    'label' => 'Planificación de la gestión preventiva respecto a los riesgos a la salud asociados al inicio de actividades: métodos de trabajo, servicios, inserción de maquinaria y equipos, incorporación de personal, entre otros',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'physical_diagnosis' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'mental_diagnosis' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'process_mapping' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'general_diagnosis' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'physical_diagnosis' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'mental_diagnosis' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'data_review' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'process_mapping' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'general_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'physical_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'mental_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'data_review' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'process_mapping' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'general_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'physical_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'mental_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'data_review' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'management_planning' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'process_mapping' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'general_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'physical_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'mental_diagnosis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'data_review' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'management_planning' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 2. ANÁLISIS Y RECOPILACIÓN DE INFORMACIÓN
    |--------------------------------------------------------------------------
    */
        'information_analysis' => [
            'name' => '2. Análisis y Recopilación de Información',
            'activities' => [
                // 2.1 Condiciones de Trabajo
                'work_hazard_baseline' => [
                    'label' => 'Elaboración de la línea base de identificación de peligros, evaluación de riesgos y establecimiento de medidas de control',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'ppe_efficiency_evaluation' => [
                    'label' => 'Evaluación y control de la eficacia de los equipos de protección personal y colectiva',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'risk_control_systems_followup' => [
                    'label' => 'Evaluación y seguimiento de los sistemas de control diseñados para eliminar o reducir la exposición a riesgos laborales',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'industrial_hygiene_evaluation' => [
                    'label' => 'Evaluación de higiene del trabajo seguimiento de las medidas de control implementadas',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'basic_services_inspection' => [
                    'label' => 'Inspección y seguimiento de los servicios de alimentación, hospedaje e instalaciones sanitarias',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],

                // 2.2 Condiciones de salud de los trabajadores
                'occupational_exams_matrix' => [
                    'label' => 'Matriz de exámenes ocupacionales de acuerdo con los riesgos laborales y puesto de trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'medical_psychological_evaluation' => [
                    'label' => 'Evaluación médica y psicológica (aptitud laboral, condiciones de salud)',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'preemployment_medical_exam' => [
                    'label' => 'Evaluación médica pre-ocupacionales - inicio',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'periodic_medical_exam' => [
                    'label' => 'Evaluación médica periódica',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'reintegration_medical_exam' => [
                    'label' => 'Evaluación médica de reintegro / especiales',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'exit_medical_exam' => [
                    'label' => 'Evaluación médica de retiro',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],

                // 2.3 Identificación y evaluación de riesgos para la salud en el trabajo
                'epidemiological_surveillance_analysis' => [
                    'label' => 'Análisis de la vigilancia epidemiológica de la salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'exposure_groups_identification' => [
                    'label' => 'Identificación del trabajador o grupos de exposición',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'exposure_agents_analysis' => [
                    'label' => 'Análisis de los agentes de exposición en los trabajadores (vías de entrada, tipos de exposición, valores límite permisibles, efectos adversos a la salud, entre otros) en función de lo expuesto en los literales a y b del numeral 2.3',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'health_promotion_evaluation' => [
                    'label' => 'Evaluación y seguimiento de las medidas de promoción de la salud y prevención de enfermedades relacionadas con el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'vulnerable_groups_followup' => [
                    'label' => 'Identificación y seguimiento de grupos prioritarios y en condición de vulnerabilidad',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'specialized_epidemiological_monitoring' => [
                    'label' => 'Programa de monitoreo epidemiológico especializado',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'work_reintegration_program' => [
                    'label' => 'Programa de reinserción laboral para el trabajador',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'epidemiological_findings_report' => [
                    'label' => 'Informe epidemiológico de hallazgos y resultados de las evaluaciones de salud en el trabajo al empleador',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'work_hazard_baseline' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'medical_psychological_evaluation' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'preemployment_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'periodic_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'reintegration_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exit_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_promotion_evaluation' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'vulnerable_groups_followup' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'work_hazard_baseline' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'ppe_efficiency_evaluation' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'risk_control_systems_followup' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'basic_services_inspection' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exams_matrix' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'medical_psychological_evaluation' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'preemployment_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'periodic_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'reintegration_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exit_medical_exam' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_surveillance_analysis' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exposure_groups_identification' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_promotion_evaluation' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'vulnerable_groups_followup' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_findings_report' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'work_hazard_baseline' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'ppe_efficiency_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'risk_control_systems_followup' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'industrial_hygiene_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'basic_services_inspection' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exams_matrix' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'medical_psychological_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'preemployment_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'periodic_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'reintegration_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exit_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_surveillance_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exposure_groups_identification' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_promotion_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'vulnerable_groups_followup' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_findings_report' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'work_hazard_baseline' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'ppe_efficiency_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'risk_control_systems_followup' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'industrial_hygiene_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'basic_services_inspection' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exams_matrix' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'medical_psychological_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'preemployment_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'periodic_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'reintegration_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exit_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_surveillance_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exposure_groups_identification' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exposure_agents_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_promotion_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'vulnerable_groups_followup' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'specialized_epidemiological_monitoring' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'work_reintegration_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_findings_report' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'work_hazard_baseline' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'ppe_efficiency_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'risk_control_systems_followup' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'industrial_hygiene_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'basic_services_inspection' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exams_matrix' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'medical_psychological_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'preemployment_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'periodic_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'reintegration_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exit_medical_exam' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_surveillance_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exposure_groups_identification' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'exposure_agents_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_promotion_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'vulnerable_groups_followup' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'specialized_epidemiological_monitoring' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'work_reintegration_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'epidemiological_findings_report' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 3. COMUNICACIÓN Y CAPACITACIÓN EN MATERIA DE SEGURIDAD Y SALUD EN EL TRABAJO
    |--------------------------------------------------------------------------
    */
        'communication_training' => [
            'name' => '3. Comunicación y Capacitación en Materia de Seguridad y Salud en el Trabajo',
            'activities' => [
                'risk_communication_worker' => [
                    'label' => 'Comunicación al trabajador sobre los posibles efectos en la salud a consecuencia de los riesgos laborales identificados en su puesto de trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'health_safety_training' => [
                    'label' => 'Capacitación interna o externa dirigida al trabajador en materia de seguridad y salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'risk_communication_worker' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_safety_training' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'risk_communication_worker' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_safety_training' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'risk_communication_worker' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_safety_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'risk_communication_worker' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_safety_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'risk_communication_worker' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_safety_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 4. ACCIONES PREVENTIVAS PARA LA GESTIÓN DE LOS PELIGROS Y RIESGOS
    |--------------------------------------------------------------------------
    */
        'preventive_actions' => [
            'name' => '4. Acciones Preventivas para la Gestión de los Peligros y Riesgos para la Seguridad y Salud en el Trabajo',
            'activities' => [
                'hierarchy_risk_controls' => [
                    'label' => 'Control de riesgos laborales de acuerdo con la jerarquía de controles para la implementación de las medidas de prevención y protección (eliminación, sustitución, control de ingeniería, control administrativo, control sobre el trabajador)',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'safety_plans' => [
                    'label' => 'Planes de seguridad de acuerdo con los riesgos laborales identificados en el lugar y/o centro de trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'hierarchy_risk_controls' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'safety_plans' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'hierarchy_risk_controls' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'safety_plans' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'hierarchy_risk_controls' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'safety_plans' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'hierarchy_risk_controls' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'safety_plans' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 5. ACCIDENTES DE TRABAJO
    |--------------------------------------------------------------------------
    */
        'workplace_accidents' => [
            'name' => '5. Accidentes de Trabajo',
            'activities' => [
                'accident_investigation_procedure' => [
                    'label' => 'Procedimiento para la ejecución de la investigación, reporte y datos de accidentes e incidentes de trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'accident_investigation_procedure' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'accident_investigation_procedure' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'accident_investigation_procedure' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'accident_investigation_procedure' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'accident_investigation_procedure' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 6. PREPARACIÓN Y RESPUESTA ANTE EMERGENCIAS
    |--------------------------------------------------------------------------
    */
        'emergency_preparedness' => [
            'name' => '6. Preparación y Respuesta ante Emergencias',
            'activities' => [
                'major_accident_risk_evaluation' => [
                    'label' => 'Evaluación de riesgo de accidentes mayores, análisis de vulnerabilidades y amenazas',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'emergency_contingency_plans' => [
                    'label' => 'Planes de emergencia y contingencia',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'emergency_action_plan' => [
                    'label' => 'Plan de acción como respuesta ante una emergencia, atención prehospitalaria y evacuación médica',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'first_response_training' => [
                    'label' => 'Programa de entrenamiento de primera respuesta para todo el personal',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'brigade_recruitment_training' => [
                    'label' => 'Programa de reclutamiento, selección, conformación, entrenamiento y evaluación técnica, médica y psicológica de brigadistas para respuesta especializada',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'emergency_equipment_maintenance' => [
                    'label' => 'Programa de dotación, inspección y mantenimiento de instalaciones, equipos y vehículos de emergencia',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'drills_execution' => [
                    'label' => 'Ejecución de simulacros (mínimo una vez al año)',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'emergency_contingency_plans' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'emergency_contingency_plans' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_action_plan' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'first_response_training' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'brigade_recruitment_training' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_equipment_maintenance' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'drills_execution' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'major_accident_risk_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_contingency_plans' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_action_plan' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'first_response_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'brigade_recruitment_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_equipment_maintenance' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'drills_execution' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'major_accident_risk_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_contingency_plans' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_action_plan' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'first_response_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'brigade_recruitment_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_equipment_maintenance' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'drills_execution' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'major_accident_risk_evaluation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_contingency_plans' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_action_plan' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'first_response_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'brigade_recruitment_training' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'emergency_equipment_maintenance' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'drills_execution' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 7. ENFERMEDADES PROFESIONALES Y RELACIONADAS CON EL TRABAJO
    |--------------------------------------------------------------------------
    */
        'occupational_diseases' => [
            'name' => '7. Enfermedades Profesionales y Relacionadas con el Trabajo',
            'activities' => [
                'similar_exposure_groups_diseases' => [
                    'label' => 'Identificación de grupos de exposición similar expuestos a agentes etiológicos que pueden causar enfermedades profesionales',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'clinical_findings_analysis' => [
                    'label' => 'Análisis de hallazgos clínicos asociados con exposiciones específicas',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'non_occupational_factors_exclusion' => [
                    'label' => 'Exclusión de factores no ocupacionales como posibles causas de enfermedades profesionales',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'occupational_disease_investigation' => [
                    'label' => 'Procedimiento para la ejecución de la investigación, reporte y datos de posibles enfermedades profesionales',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'occupational_disease_investigation' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'occupational_disease_investigation' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'clinical_findings_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'non_occupational_factors_exclusion' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_disease_investigation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'similar_exposure_groups_diseases' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'clinical_findings_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'non_occupational_factors_exclusion' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_disease_investigation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'similar_exposure_groups_diseases' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'clinical_findings_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'non_occupational_factors_exclusion' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_disease_investigation' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 8. CUIDADO DE LA SALUD GENERAL
    |--------------------------------------------------------------------------
    */
        'general_health_care' => [
            'name' => '8. Cuidado de la Salud General',
            'activities' => [
                'immunization_program' => [
                    'label' => 'Programa de inmunizaciones en coordinación con la Autoridad Sanitaria Nacional',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'public_health_programs' => [
                    'label' => 'Programas de salud pública vigentes aplicables a los lugares y/o centros de trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'primary_health_care_program' => [
                    'label' => 'Programa de atención primaria en salud en función de las necesidades de los lugares y/o centros de trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'workplace_mental_health_program' => [
                    'label' => 'Programa para el cuidado de la salud mental en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'immunization_program' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'workplace_mental_health_program' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'immunization_program' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'public_health_programs' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'immunization_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'public_health_programs' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'primary_health_care_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'workplace_mental_health_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'immunization_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'public_health_programs' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'primary_health_care_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'workplace_mental_health_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'immunization_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'public_health_programs' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'primary_health_care_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'workplace_mental_health_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 9. MANTENIMIENTO DE REGISTROS
    |--------------------------------------------------------------------------
    */
        'records_maintenance' => [
            'name' => '9. Mantenimiento de Registros',
            'activities' => [
                'occupational_health_policies_records' => [
                    'label' => 'Políticas, programas y lineamientos de salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'health_care_records' => [
                    'label' => 'Registros de atenciones de salud',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'occupational_exposure_records' => [
                    'label' => 'Registros de datos de exposiciones ocupacionales, detectadas, medidas y evaluadas',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'occupational_diseases_records' => [
                    'label' => 'Registro de investigación, reporte y datos de presuntas enfermedades profesionales y enfermedades profesionales calificadas',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'work_accidents_records' => [
                    'label' => 'Registro de investigación, reporte y datos de presuntos accidentes de trabajo y accidentes de trabajo calificados',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'health_records_updating' => [
                    'label' => 'Mantener actualizado el expediente de salud (Evaluaciones médicas y psicológicas, exámenes médicos, entre otros)',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => null,
                    ],
                ],
                'compliance_evidence_records' => [
                    'label' => 'Evidencia del cumplimiento de políticas, programas y lineamientos de salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'control_entities_records' => [
                    'label' => 'Todos los demás registros en materia de seguridad y salud en el trabajo solicitados por los entes de control',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [
                        'health_care_records' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_diseases_records' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'work_accidents_records' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_records_updating' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'health_care_records' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exposure_records' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_diseases_records' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'work_accidents_records' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_records_updating' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'occupational_health_policies_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_care_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exposure_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_diseases_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'work_accidents_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_records_updating' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'compliance_evidence_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'control_entities_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'occupational_health_policies_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_care_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exposure_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_diseases_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'work_accidents_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_records_updating' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'compliance_evidence_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'control_entities_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'occupational_health_policies_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_care_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_exposure_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_diseases_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'work_accidents_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_records_updating' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'compliance_evidence_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'control_entities_records' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],

        /*
    |--------------------------------------------------------------------------
    | 10. SEGUIMIENTO Y EVALUACIÓN
    |--------------------------------------------------------------------------
    */
        'monitoring_evaluation' => [
            'name' => '10. Seguimiento y Evaluación',
            'activities' => [
                'quality_improvement_program' => [
                    'label' => 'Programa de mejoramiento continuo de la calidad de los SISAT basados en los componentes antes descritos',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'health_work_data_analysis' => [
                    'label' => 'Análisis de datos de las condiciones de trabajo y salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'occupational_epidemiological_research' => [
                    'label' => 'Investigación epidemiológica ocupacional en ámbitos de salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'trends_indicators_analysis' => [
                    'label' => 'Análisis de tendencias e indicadores de seguridad y salud en el trabajo (exposición de riesgos laborales, morbilidad, accidentes de trabajo, enfermedades relacionadas con el trabajo, enfermedades profesionales, ausentismo, entre otros)',
                    'personal' => [
                        'responsable' => WorkStaff::SECURITY_MONITOR,
                        'support' => WorkStaff::PROFESSIONAL_MEDICAL,
                    ],
                ],
                'internal_audit_compliance' => [
                    'label' => 'Análisis del cumplimiento (auditoría interna) de la gestión de los SISAT de acuerdo con sus componentes por categoría',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
                'new_health_services_needs' => [
                    'label' => 'Identificación de necesidades para la modificación o desarrollo de nuevos servicios de salud en el trabajo',
                    'personal' => [
                        'responsable' => WorkStaff::PROFESSIONAL_MEDICAL,
                        'support' => WorkStaff::SECURITY_MONITOR,
                    ],
                ],
            ],
            'rules' => [
                [
                    'workers_min' => 1,
                    'workers_max' => 24,
                    'feats' => [],
                ],
                [
                    'workers_min' => 25,
                    'workers_max' => 49,
                    'feats' => [
                        'internal_audit_compliance' => [RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 50,
                    'workers_max' => 99,
                    'feats' => [
                        'quality_improvement_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'internal_audit_compliance' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'new_health_services_needs' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 100,
                    'workers_max' => 199,
                    'feats' => [
                        'quality_improvement_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'trends_indicators_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'internal_audit_compliance' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'new_health_services_needs' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
                [
                    'workers_min' => 200,
                    'workers_max' => null,
                    'feats' => [
                        'quality_improvement_program' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'health_work_data_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'occupational_epidemiological_research' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'trends_indicators_analysis' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'internal_audit_compliance' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                        'new_health_services_needs' => [RiskLevel::LOW, RiskLevel::MEDIUM, RiskLevel::HIGH],
                    ],
                ],
            ],
        ],
    ];

    public function run(): void
    {
        foreach ($this->SISAT_DATA as $module => $moduleData) {
            $module = SisatModule::updateOrCreate([
                'slug' => $module,
            ], [
                'name' => $moduleData['name'],
                'slug' => $module,
            ]);
            foreach ($moduleData['activities'] as $activity => $actvityData) {
                $rules = [
                    [
                        'workers_min' => 1,
                        'workers_max' => 24,
                        'levels' => $moduleData['rules'][0]['feats'][$activity] ?? [],
                    ],
                    [
                        'workers_min' => 25,
                        'workers_max' => 49,
                        'levels' => $moduleData['rules'][1]['feats'][$activity] ?? [],
                    ],
                    [
                        'workers_min' => 50,
                        'workers_max' => 99,
                        'levels' => $moduleData['rules'][2]['feats'][$activity] ?? [],
                    ],
                    [
                        'workers_min' => 100,
                        'workers_max' => 199,
                        'levels' => $moduleData['rules'][3]['feats'][$activity] ?? [],
                    ],
                    [
                        'workers_min' => 200,
                        'workers_max' => null,
                        'levels' => $moduleData['rules'][4]['feats'][$activity] ?? [],
                    ],
                ];
                $activity = SisatActivity::updateOrCreate([
                    'slug' => $activity,
                ], [
                    'slug' => $activity,
                    'name' => $actvityData['label'],
                    'sisat_module_id' => $module->id,
                    'responsable' => $actvityData['personal']['responsable'],
                    'support' => $actvityData['personal']['support'],
                    'rules' => $rules,
                ]);
            }
        }
    }
}
