<?php

namespace Database\Seeders;

use App\Models\CIIU;
use App\Models\Company;
use App\Models\Position;
use App\Models\Workspace;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    private $departaments = [
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
        'Legal y Cumplimiento' => [
            'Asesor Jurídico',
            'Oficial de Cumplimiento',
            'Auditor Interno',
        ],
    ];

    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $ruc = fake()->unique()->numerify('20#########');
            $company = Company::updateOrCreate([
                'ruc' => $ruc,
            ], [
                'ruc' => $ruc,
                'name' => fake()->company(),
                'address' => fake()->address(),
                'email' => fake()->companyEmail(),
                'ciiu_id' => CIIU::inRandomOrder()->value('id'),
            ]);
            foreach ($this->departaments as $workspace => $positions) {
                $workspace = Workspace::create([
                    'name' => $workspace,
                    'company_id' => $company->id,
                ]);
                foreach ($positions as $position) {
                    $position = Position::create([
                        'name' => $position,
                        'workspace_id' => $workspace->id,
                    ]);
                }
            }
        }
    }
}
