<?php

namespace App\Modules;

use App\Models\Company;
use App\Models\SisatActivity;

class DefaultCalculate implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        $existsResults = $activity->results()->where('company_id', $company->id)->exists();

        return $existsResults ? 1 : 0;
    }
}
