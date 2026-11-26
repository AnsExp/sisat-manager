<?php

namespace App\Modules;

use App\Models\Company;
use App\Models\SisatActivity;
use Illuminate\Support\Str;

class ActivityCalculator
{
    /** @var array<string, float> */
    private static array $calculateCache = [];

    public static function calculate(Company $company, SisatActivity $activity): float
    {
        $moduleCode = Str::studly($activity->module->slug);
        $activityCode = Str::studly($activity->slug);
        $cacheKey = $company->getKey().':'.$moduleCode.'-'.$activityCode;

        if (\array_key_exists($cacheKey, self::$calculateCache)) {
            return self::$calculateCache[$cacheKey];
        }

        $class = "App\\Modules\\{$moduleCode}\\{$activityCode}";

        if (! class_exists($class)) {
            return self::$calculateCache[$cacheKey] = (float) (new DefaultCalculate)->calculate($company, $activity);
        }

        $item = new $class;

        if ($item instanceof ActivityItem) {
            return self::$calculateCache[$cacheKey] = (float) $item->calculate($company, $activity);
        }

        return self::$calculateCache[$cacheKey] = 0.0;
    }
}
