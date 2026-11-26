<?php

namespace App\Modules;

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Illuminate\Support\Collection;

class ModuleChecker
{
    /** @var array<int|string, array<int|string, bool>> */
    private static array $activityCache = [];

    /** @var array<int|string, Collection<int, SisatActivity>> */
    private static array $moduleCache = [];

    public static function checkActivity(Company $company, SisatActivity $activity): bool
    {
        $companyKey = $company->getKey();
        $activityKey = $activity->getKey();

        if (\array_key_exists($activityKey, self::$activityCache[$companyKey] ?? [])) {
            return self::$activityCache[$companyKey][$activityKey];
        }

        $employeeCount = $company->employees()->count();
        $companyLevel = $company->ciiu->level->value;

        foreach ($activity->rules ?? [] as $rule) {
            $min = $rule['workers_min'] ?? 0;
            $max = $rule['workers_max'] ?? PHP_INT_MAX;

            if ($employeeCount >= $min && $employeeCount <= $max) {
                if (empty($rule['levels'])) {
                    return self::$activityCache[$companyKey][$activityKey] = false;
                }

                return self::$activityCache[$companyKey][$activityKey] = \in_array($companyLevel, $rule['levels'], true);
            }
        }

        return self::$activityCache[$companyKey][$activityKey] = false;
    }

    /**
     * @return Collection<int, SisatActivity>
     */
    public static function activitiesForModule(Company $company, SisatModule $module): Collection
    {
        $cacheKey = $company->getKey().':'.$module->getKey();

        if (isset(self::$moduleCache[$cacheKey])) {
            return self::$moduleCache[$cacheKey];
        }

        return self::$moduleCache[$cacheKey] = $module->activities
            ->filter(fn (SisatActivity $activity): bool => self::checkActivity($company, $activity))
            ->values();
    }
}
