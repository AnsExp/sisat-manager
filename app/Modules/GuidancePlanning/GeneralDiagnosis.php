<?php

namespace App\Modules\GuidancePlanning;

use App\Models\Company;
use App\Models\SisatActivity;
use App\Modules\ActivityItem;

class GeneralDiagnosis implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        $results = $activity->results()->where('company_id', $company->id)->get();
        $total = $results->count();
        $employees = $company->employees()->count();

        if ($employees === 0) {
            return 0;
        }

        return $total / $employees;
    }
}
