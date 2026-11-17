<?php

namespace App\Modules;

use App\Enums\RiskLevel;
use App\Models\Company;
use Illuminate\Container\Container;
use Illuminate\Contracts\Foundation\Application;

class ModuleChecker
{
    /**
     * Determina si una compañía debe cumplir con una actividad específica de un módulo.
     */
    public static function companyHasActivity(
        Company $company,
        string $module,
        string $activityCode,
        bool $applyHighRiskRule = true
    ): bool {
        $workers = self::getCompanyWorkerCount($company);
        $riskLevel = self::getCompanyRiskLevel($company);

        if ($riskLevel === null) {
            return false;
        }

        return self::hasActivity($workers, $riskLevel, $module, $activityCode, $applyHighRiskRule);
    }

    /**
     * Verifica directamente por número de trabajadores y nivel de riesgo si aplica una actividad.
     */
    public static function hasActivity(
        int $workers,
        RiskLevel|string $riskLevel,
        string $module,
        string $activityCode,
        bool $applyHighRiskRule = true
    ): bool {
        if (is_string($riskLevel)) {
            $riskLevel = RiskLevel::tryFrom($riskLevel);

            if ($riskLevel === null) {
                return false;
            }
        }

        $moduleConfig = self::getModule($module);

        if (! $moduleConfig || ! isset($moduleConfig['rules'])) {
            return false;
        }

        $rule = self::findMatchingRule($moduleConfig['rules'], $workers, $riskLevel, $applyHighRiskRule);

        if (! $rule || ! isset($rule['feats'][$activityCode])) {
            return false;
        }

        return in_array($riskLevel, $rule['feats'][$activityCode], true);
    }

    /**
     * Obtiene los códigos de las actividades aplicables a una compañía en un módulo específico.
     *
     * @return string[]
     */
    public static function getCompanyActivityCodes(
        Company $company,
        string $module,
        bool $applyHighRiskRule = true
    ): array {
        $workers = self::getCompanyWorkerCount($company);
        $riskLevel = self::getCompanyRiskLevel($company);

        if ($riskLevel === null) {
            return [];
        }

        return self::getActivityCodes($workers, $riskLevel, $module, $applyHighRiskRule);
    }

    /**
     * Obtiene los códigos de las actividades aplicables según trabajadores y nivel de riesgo.
     *
     * @return string[]
     */
    public static function getActivityCodes(
        int $workers,
        RiskLevel|string $riskLevel,
        string $module,
        bool $applyHighRiskRule = true
    ): array {
        if (is_string($riskLevel)) {
            $riskLevel = RiskLevel::tryFrom($riskLevel);

            if ($riskLevel === null) {
                return [];
            }
        }

        $moduleConfig = self::getModule($module);

        if (! $moduleConfig || ! isset($moduleConfig['rules'])) {
            return [];
        }

        $rule = self::findMatchingRule($moduleConfig['rules'], $workers, $riskLevel, $applyHighRiskRule);

        if (! $rule || ! isset($rule['feats'])) {
            return [];
        }

        $activeCodes = [];

        foreach ($rule['feats'] as $actCode => $allowedRisks) {
            if (in_array($riskLevel, $allowedRisks, true)) {
                $activeCodes[] = $actCode;
            }
        }

        return $activeCodes;
    }

    /**
     * Obtiene las actividades detalladas (código, label, roles) que aplican a la empresa en un módulo.
     */
    public static function getCompanyActivities(
        Company $company,
        string $module,
        bool $applyHighRiskRule = true
    ): array {
        $codes = self::getCompanyActivityCodes($company, $module, $applyHighRiskRule);
        $moduleConfig = self::getModule($module);

        if (! $moduleConfig || ! isset($moduleConfig['activities'])) {
            return [];
        }

        $activities = [];

        foreach ($codes as $code) {
            if (isset($moduleConfig['activities'][$code])) {
                $activities[$code] = array_merge(
                    ['code' => $code],
                    $moduleConfig['activities'][$code]
                );
            }
        }

        return $activities;
    }

    /**
     * Obtiene todas las actividades aplicables a la empresa en todos los módulos de SISAT.
     */
    public static function getAllCompanyActivities(
        Company $company,
        bool $applyHighRiskRule = true
    ): array {
        $allModules = self::getAllModules();
        $result = [];

        foreach (array_keys($allModules) as $modKey) {
            $acts = self::getCompanyActivities($company, $modKey, $applyHighRiskRule);

            if (! empty($acts)) {
                $result[$modKey] = [
                    'module_name' => $allModules[$modKey]['name'] ?? $modKey,
                    'activities' => $acts,
                ];
            }
        }

        return $result;
    }

    /**
     * Determina si la compañía tiene al menos una actividad obligatoria en el módulo.
     */
    public static function companyHasModule(
        Company $company,
        string $module,
        bool $applyHighRiskRule = true
    ): bool {
        return ! empty(self::getCompanyActivityCodes($company, $module, $applyHighRiskRule));
    }

    /**
     * Lista los módulos que aplican a la compañía.
     */
    public static function getCompanyModules(
        Company $company,
        bool $applyHighRiskRule = true
    ): array {
        $allModules = self::getAllModules();
        $applicable = [];

        foreach ($allModules as $modKey => $modData) {
            if (self::companyHasModule($company, $modKey, $applyHighRiskRule)) {
                $applicable[$modKey] = $modData['name'] ?? $modKey;
            }
        }

        return $applicable;
    }

    /**
     * Encuentra la regla de exigibilidad correspondiente en base a trabajadores y riesgo.
     */
    public static function findMatchingRule(
        array $rules,
        int $workers,
        ?RiskLevel $riskLevel = null,
        bool $applyHighRiskRule = true
    ): ?array {
        // Art. 16: empresas de < 50 trabajadores con riesgo alto deben cumplir categoría III (50 a 99)
        if ($applyHighRiskRule && $riskLevel === RiskLevel::HIGH && $workers < 50) {
            $workers = 50;
        }

        foreach ($rules as $rule) {
            $min = $rule['workers_min'] ?? 0;
            $max = $rule['workers_max'] ?? null;

            if ($workers >= $min && ($max === null || $workers <= $max)) {
                return $rule;
            }
        }

        return null;
    }

    /**
     * Obtiene la categoría SISAT (I, II, III, IV o V) de la compañía.
     */
    public static function getCompanyCategory(Company $company, bool $applyHighRiskRule = true): ?string
    {
        $workers = self::getCompanyWorkerCount($company);
        $risk = self::getCompanyRiskLevel($company);

        return self::resolveCategory($workers, $risk, $applyHighRiskRule);
    }

    /**
     * Resuelve la categoría SISAT según el número de trabajadores y nivel de riesgo.
     */
    public static function resolveCategory(
        int $workers,
        RiskLevel|string|null $riskLevel = null,
        bool $applyHighRiskRule = true
    ): ?string {
        if ($workers <= 0) {
            return null;
        }

        if (is_string($riskLevel)) {
            $riskLevel = RiskLevel::tryFrom($riskLevel);
        }

        // Art. 16: menos de 50 trabajadores con alto riesgo aplican a Cat. III
        if ($applyHighRiskRule && $riskLevel === RiskLevel::HIGH && $workers < 50) {
            return 'III';
        }

        return match (true) {
            $workers >= 1 && $workers <= 24 => 'I',
            $workers >= 25 && $workers <= 49 => 'II',
            $workers >= 50 && $workers <= 99 => 'III',
            $workers >= 100 && $workers <= 199 => 'IV',
            $workers >= 200 => 'V',
            default => null,
        };
    }

    /**
     * Obtiene la descripción detallada de una categoría SISAT.
     */
    public static function getCategoryDetails(string $category): array
    {
        return match ($category) {
            'I' => [
                'code' => 'I',
                'name' => 'Microempresa / Pequeña empresa',
                'workers_range' => '1 a 24 trabajadores',
                'complexity' => 'Riesgo Medio y Alto (Bajo riesgo exceptuado)',
            ],
            'II' => [
                'code' => 'II',
                'name' => 'Pequeña empresa',
                'workers_range' => '25 a 49 trabajadores',
                'complexity' => 'Riesgo Medio y Alto',
            ],
            'III' => [
                'code' => 'III',
                'name' => 'Mediana empresa tipo A',
                'workers_range' => '50 a 99 trabajadores',
                'complexity' => 'Todos los niveles de riesgo',
            ],
            'IV' => [
                'code' => 'IV',
                'name' => 'Mediana empresa tipo B',
                'workers_range' => '100 a 199 trabajadores',
                'complexity' => 'Todos los niveles de riesgo',
            ],
            'V' => [
                'code' => 'V',
                'name' => 'Gran empresa',
                'workers_range' => '200 trabajadores en adelante',
                'complexity' => 'Todos los niveles de riesgo',
            ],
            default => [
                'code' => $category,
                'name' => 'Desconocida',
                'workers_range' => 'N/A',
                'complexity' => 'N/A',
            ],
        };
    }

    /**
     * Verifica si la compañía está exceptuada de los SISAT según el Art. 25 (1 a 24 trab. y Bajo Riesgo).
     */
    public static function isExempt(Company $company): bool
    {
        $workers = self::getCompanyWorkerCount($company);
        $risk = self::getCompanyRiskLevel($company);

        return $workers >= 1 && $workers <= 24 && $risk === RiskLevel::LOW;
    }

    /**
     * Obtiene el número total de trabajadores de la compañía de forma segura.
     */
    public static function getCompanyWorkerCount(Company $company): int
    {
        if (isset($company->total_workers)) {
            return (int) $company->total_workers;
        }

        if ($company->relationLoaded('employees')) {
            return $company->employees()->count();
        }

        return $company->employees()->count();
    }

    /**
     * Obtiene el nivel de riesgo de la compañía a partir de su actividad económica (CIIU).
     */
    public static function getCompanyRiskLevel(Company $company): ?RiskLevel
    {
        $ciiu = $company->relationLoaded('ciiu') ? $company->ciiu : $company->ciiu()->first();

        if (! $ciiu || ! $ciiu->level) {
            return null;
        }

        return $ciiu->level instanceof RiskLevel
            ? $ciiu->level
            : RiskLevel::tryFrom((string) $ciiu->level);
    }

    /**
     * Obtiene los datos de configuración de un módulo.
     */
    public static function getModule(string $module): ?array
    {
        $all = self::getAllModules();

        return $all[$module] ?? null;
    }

    /**
     * Obtiene todos los módulos configurados en `sisat.php`.
     */
    public static function getAllModules(): array
    {
        try {
            if (class_exists(Container::class)) {
                $container = Container::getInstance();

                if ($container instanceof Application && $container->bound('config')) {
                    $cfg = config('sisat');

                    if (! empty($cfg)) {
                        return $cfg;
                    }
                }
            }
        } catch (\Throwable) {
            // Container no inicializado en entorno aislado
        }

        $path = dirname(__DIR__, 2) . '/config/sisat.php';

        if (file_exists($path)) {
            return require $path;
        }

        return [];
    }

    /**
     * Obtiene los detalles de una actividad específica (label, responsable, apoyo).
     */
    public static function getActivityDetails(string $module, string $activityCode): ?array
    {
        $moduleConfig = self::getModule($module);

        return $moduleConfig['activities'][$activityCode] ?? null;
    }

    /**
     * Genera un informe/diagnóstico completo del estado de cumplimiento SISAT de la empresa.
     */
    public static function getCompanyDiagnostic(Company $company, bool $applyHighRiskRule = true): array
    {
        $workers = self::getCompanyWorkerCount($company);
        $risk = self::getCompanyRiskLevel($company);
        $category = self::resolveCategory($workers, $risk, $applyHighRiskRule);
        $exempt = self::isExempt($company);
        $modules = self::getAllCompanyActivities($company, $applyHighRiskRule);

        $totalActivities = 0;

        foreach ($modules as $m) {
            $totalActivities += count($m['activities']);
        }

        return [
            'company_id' => $company->id ?? null,
            'company_name' => $company->name ?? null,
            'workers_count' => $workers,
            'risk_level' => $risk?->value,
            'risk_level_label' => $risk?->label(),
            'is_exempt' => $exempt,
            'category' => $category,
            'category_details' => $category ? self::getCategoryDetails($category) : null,
            'total_applicable_modules' => count($modules),
            'total_applicable_activities' => $totalActivities,
            'modules_breakdown' => $modules,
        ];
    }
}
