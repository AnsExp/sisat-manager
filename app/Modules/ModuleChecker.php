<?php

namespace App\Modules;

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;

class ModuleChecker
{
    public static function checkActivity(Company $company, SisatActivity|string $activity)
    {
        if (\is_string($activity)) {
            if (! ($activity = SisatActivity::where('slug', $activity)->first())) {
                return false;
            }
        }

        $employeeCount = $company->employees()->count();
        $companyLevel = $company->ciiu->level->value;

        foreach ($activity->rules as $rule) {
            $min = $rule['workers_min'] ?? 0;
            $max = $rule['workers_max'] ?? PHP_INT_MAX;

            if ($employeeCount >= $min && $employeeCount <= $max) {

                if (empty($rule['levels'])) {
                    return false;
                }

                return \in_array($companyLevel, $rule['levels'], true);
            }
        }

        return false;
    }

    public static function activitiesForModule(Company $company, SisatModule|string $module)
    {
        if (\is_string($module)) {
            if (! ($module = SisatModule::where('slug', $module)->first())) {
                return [];
            }
        }

        $activities = [];

        foreach ($module->activities as $activity) {
            if (self::checkActivity($company, $activity)) {
                $activities[] = $activity;
            }
        }

        return $activities;
    }
}
