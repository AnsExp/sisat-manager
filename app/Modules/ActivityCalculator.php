<?php

namespace App\Modules;

use App\Models\Company;
use App\Models\SisatActivity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ActivityCalculator
{
    /**
     * Summary of calculate
     * @param Company $company
     * @param SisatActivity $activity
     * @return float
     */
    public static function calculate(Company $company, SisatActivity $activity)
    {
        $moduleCode = Str::studly($activity->module->slug);
        $activityCode = Str::studly($activity->slug);
        $class = "App\\Modules\\{$moduleCode}\\{$activityCode}";
        Log::info($class);
        if (! class_exists($class)) {
            return 0.0;
        }
        $item = new $class;
        if ($item instanceof ActivityItem) {
            return $item->calculate($company, $activity);
        }

        return 0.0;
    }
}
