<?php

namespace Database\Seeders;

use App\Models\IloItem;
use Illuminate\Database\Seeder;

class IloItemSeeder extends Seeder
{
    /**
     * Catálogo de departamentos y puestos estándar por compañía.
     */
    private array $iloItems = [
        [
            'name' => 'Enfermedades profesionales causadas por la exposición a agentes que resulte de las actividades laborales',
            'subitems' => [
                [
                    'name' => 'Enfermedades causadas por agentes químicos',
                    'subitems' => [
                        ['name' => 'Enfermedades causadas por berilio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por cadmio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por fósforo o sus compuestos'],
                        ['name' => 'Enfermedades causadas por cromo o sus compuestos'],
                        ['name' => 'Enfermedades causadas por manganeso o sus compuestos'],
                        ['name' => 'Enfermedades causadas por arsénico o sus compuestos'],
                        ['name' => 'Enfermedades causadas por mercurio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por plomo o sus compuestos'],
                        ['name' => 'Enfermedades causadas por flúor o sus compuestos'],
                        ['name' => 'Enfermedades causadas por disulfuro de carbono'],
                        ['name' => 'Enfermedades causadas por los derivados halogenados de los hidrocarburos alifáticos o aromáticos'],
                        ['name' => 'Enfermedades causadas por benceno o sus homólogos'],
                        ['name' => 'Enfermedades causadas por los derivados nitrados y amínicos del benceno o de sus homólogos'],
                        ['name' => 'Enfermedades causadas por nitroglicerina u otros ésteres del ácido nítrico'],
                        ['name' => 'Enfermedades causadas por alcoholes, glicoles o cetonas'],
                        ['name' => 'Enfermedades causadas por sustancias asfixiantes como monóxido de carbono, sulfuro de hidrógeno, cianuro de hidrógeno o sus derivados'],
                        ['name' => 'Enfermedades causadas por acrilonitrilo'],
                        ['name' => 'Enfermedades causadas por óxidos de nitrógeno'],
                        ['name' => 'Enfermedades causadas por vanadio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por antimonio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por hexano'],
                        ['name' => 'Enfermedades causadas por ácidos minerales'],
                        ['name' => 'Enfermedades causadas por agentes farmacéuticos'],
                        ['name' => 'Enfermedades causadas por níquel o sus compuestos'],
                        ['name' => 'Enfermedades causadas por talio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por osmio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por selenio o sus compuestos'],
                        ['name' => 'Enfermedades causadas por cobre o sus compuestos'],
                        ['name' => 'Enfermedades causadas por platino o sus compuestos'],
                        ['name' => 'Enfermedades causadas por estaño o sus compuestos'],
                        ['name' => 'Enfermedades causadas por zinc o sus compuestos'],
                        ['name' => 'Enfermedades causadas por fosgeno'],
                        ['name' => 'Enfermedades causadas por sustancias irritantes de la córnea como benzoquinona'],
                        ['name' => 'Enfermedades causadas por amoniaco'],
                        ['name' => 'Enfermedades causadas por isocianatos'],
                        ['name' => 'Enfermedades causadas por plaguicidas'],
                        ['name' => 'Enfermedades causadas por óxidos de azufre'],
                        ['name' => 'Enfermedades causadas por disolventes orgánicos'],
                        ['name' => 'Enfermedades causadas por látex o productos que contienen látex'],
                        ['name' => 'Enfermedades causadas por cloro'],
                        ['name' => 'Enfermedades causadas por otros agentes químicos en el trabajo no mencionados en los puntos anteriores cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a dichos agentes químicos que resulte de las actividades laborales y la(s) enfermedad (es) contraída(s) por el trabajador'],
                    ],
                ],
                [
                    'name' => 'Enfermedades causadas por agentes físicos',
                    'subitems' => [
                        ['name' => 'Deterioro de la audición causada por ruido'],
                        ['name' => 'Enfermedades causadas por vibraciones (trastornos de músculos, tendones, huesos, articulaciones, vasos sanguíneos periféricos o nervios periféricos)'],
                        ['name' => 'Enfermedades causadas por aire comprimido o descomprimido'],
                        ['name' => 'Enfermedades causadas por radiaciones ionizantes'],
                        ['name' => 'Enfermedades causadas por radiaciones ópticas (ultravioleta, de luz visible, infrarroja), incluido el láser'],
                        ['name' => 'Enfermedades causadas por exposición a temperaturas extremas'],
                        ['name' => 'Enfermedades causadas por otros agentes físicos en el trabajo no mencionados en los puntos anteriores cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a dichos agentes físicos que resulte de las actividades laborales y la(s) enfermedad(es) contraída(s) por el trabajador'],
                    ],
                ],
                [
                    'name' => 'Agentes biológicos y enfermedades infecciosas o parasitarias',
                    'subitems' => [
                        ['name' => 'Brucelosis'],
                        ['name' => 'Virus de la hepatitis'],
                        ['name' => 'Virus de la inmunodeficiencia humana (VIH)'],
                        ['name' => 'Tétanos'],
                        ['name' => 'Tuberculosis'],
                        ['name' => 'Síndromes tóxicos o inflamatorios asociados con contaminantes bacterianos o fúngicos'],
                        ['name' => 'Ántrax'],
                        ['name' => 'Leptospirosis'],
                        ['name' => 'Enfermedades causadas por otros agentes biológicos en el trabajo no mencionados en los puntos anteriores cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a dichos agentes biológicos que resulte de las actividades laborales y la(s) enfermedad(es) contraída(s) por el trabajador'],
                    ],
                ],
            ],
        ],
        [
            'name' => 'Enfermedades profesionales según el órgano o sistema afectado',
            'subitems' => [
                [
                    'name' => 'Enfermedades del sistema respiratorio',
                    'subitems' => [
                        ['name' => 'Neumoconiosis causadas por polvo mineral fibrogénico (silicosis, antracosilicosis, asbestosis)'],
                        ['name' => 'Silicotuberculosis'],
                        ['name' => 'Siderosis'],
                        ['name' => 'Enfermedades broncopulmonares causadas por polvo de metales duros'],
                        ['name' => 'Neumoconiosis causadas por polvo mineral no fibrogénico'],
                        ['name' => 'Enfermedades broncopulmonares causadas por polvo de algodón (bisinosis), de lino, de cáñamo, de sisal o de caña de azúcar (bagazosis)'],
                        ['name' => 'Asma causada por agentes sensibilizantes o irritantes reconocidos e inherentes al proceso de trabajo'],
                        ['name' => 'Alveolitis alérgica extrínseca causada por inhalación de polvos orgánicos o de aerosoles contaminados por microbios que resulte de las actividades laborales'],
                        ['name' => 'Enfermedades pulmonares obstructivas crónicas causadas por inhalación de polvo de carbón, polvo de canteras de piedra, polvo de madera, polvo de cereales y del trabajo agrícola, polvo de locales para animales, polvo de textiles, y polvo de papel que resulte de las actividades laborales'],
                        ['name' => 'Enfermedades pulmonares causadas por aluminio'],
                        ['name' => 'Trastornos de las vías respiratorias superiores causados por agentes sensibilizantes o irritantes reconocidos e inherentes al proceso de trabajo'],
                        ['name' => 'Otras enfermedades del sistema respiratorio no mencionadas en los puntos anteriores cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a factores de riesgo que resulte de las actividades laborales y la(s) enfermedad(es) contraída(s) por el trabajador'],
                    ],
                ],
                [
                    'name' => 'Enfermedades de la piel',
                    'subitems' => [
                        ['name' => 'Dermatosis alérgica de contacto y urticaria de contacto causadas por otros alergenos reconocidos, no mencionados en los puntos anteriores, que resulten de las actividades laborales'],
                        ['name' => 'Dermatosis irritante de contacto causada por otros agentes irritantes reconocidos, no mencionados en los puntos anteriores, que resulten de las actividades laborales'],
                        ['name' => 'Vitiligo causado por otros agentes reconocidos, no mencionados en los puntos anteriores, que resulten de las actividades laborales'],
                        ['name' => 'Otras enfermedades de la piel causadas por agentes físicos, químicos o biológicos en el trabajo no incluidos en otros puntos cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a factores de riesgo que resulte de las actividades laborales y la(s) enfermedad(es) de la piel contraída(s) por el trabajador'],
                    ],
                ],
                [
                    'name' => 'Enfermedades del sistema osteomuscular',
                    'subitems' => [
                        ['name' => 'Tenosinovitis de la estiloides radial debida a movimientos repetitivos, esfuerzos intensos y posturas extremas de la muñeca'],
                        ['name' => 'Tenosinovitis crónica de la mano y la muñeca debida a movimientos repetitivos, esfuerzos intensos y posturas extremas de la muñeca'],
                        ['name' => 'Bursitis del olécranon debida a presión prolongada en la región del codo'],
                        ['name' => 'Bursitis prerrotuliana debida a estancia prolongada en posición de rodillas'],
                        ['name' => 'Epicondilitis debida a trabajo intenso y repetitivo'],
                        ['name' => 'Lesiones de menisco consecutivas a períodos prolongados de trabajo en posición de rodillas o en cuclillas'],
                        ['name' => 'Síndrome del túnel carpiano debido a períodos prolongados de trabajo intenso y repetitivo, trabajo que entrañe vibraciones, posturas extremas de la muñeca, o una combinación de estos tres factores'],
                        ['name' => 'Otros trastornos del sistema osteomuscular no mencionados en los puntos anteriores cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a factores de riesgo que resulte de las actividades laborales y el (los) trastorno(s) del sistema osteomuscular contraído(s) por el trabajador'],
                    ],
                ],
                [
                    'name' => 'Trastornos mentales y del comportamiento',
                    'subitems' => [
                        ['name' => 'Trastorno de estrés postraumático'],
                        ['name' => 'Otros trastornos mentales o del comportamiento no mencionados en el punto anterior cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a factores de riesgo que resulte de las actividades laborales y el (los) trastorno(s) mentales o del comportamiento contraído(s) por el trabajador'],
                    ],
                ],
            ],
        ],
        [
            'name' => 'Cáncer profesional',
            'subitems' => [
                [
                    'name' => 'Cáncer causado por los agentes siguientes',
                    'subitems' => [
                        ['name' => 'Amianto o asbesto'],
                        ['name' => 'Bencidina y sus sales'],
                        ['name' => 'Éter bis-clorometílico'],
                        ['name' => 'Compuestos de cromo VI'],
                        ['name' => 'Alquitranes de hulla, brea de carbón u hollín'],
                        ['name' => 'Beta-naftilamina'],
                        ['name' => 'Cloruro de vinilo'],
                        ['name' => 'Benceno'],
                        ['name' => 'Derivados nitrados y amínicos tóxicos del benceno o de sus homólogos'],
                        ['name' => 'Radiaciones ionizantes'],
                        ['name' => 'Alquitrán, brea, betún, aceite mineral, antraceno, o los compuestos, productos o residuos de estas sustancias'],
                        ['name' => 'Emisiones de hornos de coque'],
                        ['name' => 'Compuestos de níquel'],
                        ['name' => 'Polvo de madera'],
                        ['name' => 'Arsénico y sus compuestos'],
                        ['name' => 'Berilio y sus compuestos'],
                        ['name' => 'Cadmio y sus compuestos'],
                        ['name' => 'Erionita'],
                        ['name' => 'Óxido de etileno'],
                        ['name' => 'Virus de la hepatitis B (VHB) y virus de la hepatitis C (VHC)'],
                        ['name' => 'Cáncer causado por otros agentes en el trabajo no mencionados en los puntos anteriores cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición a dichos agentes que resulte de las actividades laborales y el cáncer contraído por el trabajador'],
                    ],
                ],
            ],
        ],
        [
            'name' => 'Otras enfermedades',
            'subitems' => [
                [
                    'name' => 'Nistagmo de los mineros',
                    'subitems' => [],
                ],
                [
                    'name' => 'Otras enfermedades específicas causadas por ocupaciones o procesos no mencionados en esta lista cuando se haya establecido, científicamente o por métodos adecuados a las condiciones y la práctica nacionales, un vínculo directo entre la exposición que resulte de las actividades laborales y la(s) enfermedad(es) contraída(s) por el trabajador',
                    'subitems' => [],
                ],
            ],
        ],
    ];

    /**
     * Ejecuta las semillas en la base de datos.
     */
    public function run(): void
    {
        foreach ($this->iloItems as $i => $item_1) {
            $ii = IloItem::create([
                'index' => $i + 1,
                'name' => $item_1['name'],
            ]);
            if (! empty($item_1['subitems'])) {
                foreach ($item_1['subitems'] as $j => $item_2) {
                    $ij = IloItem::create([
                        'parent_id' => $ii->id,
                        'index' => $j + 1,
                        'name' => $item_2['name'],
                    ]);
                    if (! empty($item_2['subitems'])) {
                        foreach ($item_2['subitems'] as $k => $item_3) {
                            IloItem::create([
                                'parent_id' => $ij->id,
                                'index' => $k + 1,
                                'name' => $item_3['name'],
                            ]);
                        }
                    }
                }
            }
        }
    }
}
