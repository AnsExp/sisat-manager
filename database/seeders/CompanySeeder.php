<?php

namespace Database\Seeders;

use App\Enums\Gender;
use App\Enums\RiskLevel;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Workspace;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Catálogo de departamentos y puestos estándar por compañía.
     */
    private array $departments = [
        'Tecnología e Informática' => [
            'Líder Técnico',
            'Desarrollador Backend',
            'Desarrollador Frontend',
            'Administrador de Base de Datos',
            'Soporte Técnico',
        ],
        'Recursos Humanos' => [
            'Gerente de Talento Humano',
            'Especialista en Nómina y Compensaciones',
            'Reclutador / Selección',
            'Coordinador de Bienestar Laboral',
        ],
        'Administración y Finanzas' => [
            'Director Financiero',
            'Contador General',
            'Analista de Tesorería',
            'Auxiliar Contable',
        ],
        'Operaciones y Logística' => [
            'Gerente de Operaciones',
            'Coordinador de Despacho y Almacén',
            'Supervisor de Planta',
            'Analista de Inventario',
        ],
        'Ventas y Mercadeo' => [
            'Director Comercial',
            'Ejecutivo de Cuentas',
            'Especialista en Marketing Digital',
            'Asesor de Ventas',
        ],
        'Seguridad y Salud en el Trabajo' => [
            'Coordinador de Seguridad y Salud Ocupacional',
            'Técnico de Higiene y Seguridad',
            'Médico Ocupacional',
        ],
        'Legal y Cumplimiento' => [
            'Asesor Jurídico',
            'Oficial de Cumplimiento',
            'Auditor Interno',
        ],
    ];

    /**
     * Ejecuta las semillas en la base de datos.
     */
    public function run(): void
    {
        $genders = [Gender::MALE->value, Gender::FEMALE->value];

        foreach (RiskLevel::cases() as $riskLevel) {
            foreach ([rand(1, 24), rand(25, 49), rand(50, 99), rand(100, 199), rand(200, 350)] as $employeesCount) {
                $ciiuId = CIIU::where('level', $riskLevel->value)->inRandomOrder()->value('id');
                $company = Company::create(
                    [
                        'name' => fake()->company(),
                        'ruc' => fake()->numerify('###########'),
                        'address' => fake()->address(),
                        'email' => fake()->companyEmail(),
                        'ciiu_id' => $ciiuId,
                    ]
                );
                $positionsIndex = [];
                foreach ($this->departments as $department => $positions) {
                    $workspace = Workspace::create([
                        'name' => $department,
                        'company_id' => $company->id,
                    ]);
                    foreach ($positions as $position) {
                        $position = Position::create([
                            'name' => $position,
                            'workspace_id' => $workspace->id,
                        ]);
                        $positionsIndex[] = $position;
                    }
                }
                for ($i = 0; $i < $employeesCount; $i++) {
                    $gender = fake()->randomElement($genders);
                    $currentPosition = fake()->randomElement($positionsIndex);
                    Employee::create([
                        'first_name' => fake()->firstName($gender),
                        'second_first_name' => fake()->optional()->firstName($gender),
                        'last_name' => fake()->lastName($gender),
                        'second_last_name' => fake()->optional()->lastName($gender),
                        'gender' => $gender,
                        'email' => fake()->email(),
                        'phone' => fake()->phoneNumber(),
                        'birthday' => fake()->dateTimeBetween('1980-01-01', '2000-01-01')->format('Y-m-d'),
                        'id_card' => fake()->numerify('##########'),
                        'position_id' => $currentPosition->id,
                        'workspace_id' => $currentPosition->workspace->id,
                        'company_id' => $currentPosition->workspace->company->id,
                    ]);
                }
            }
        }
    }
}
