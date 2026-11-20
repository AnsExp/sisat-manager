<?php

namespace App\Modules\GuidancePlanning;

use App\Models\Company;
use App\Models\IloItem;
use App\Models\SisatActivity;
use App\Modules\ActivityItem;

class DataReview implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        // return 1;

        $totalTrue = $activity->results()
            ->where('company_id', $company->id)
            ->whereRaw("(results->>'value')::boolean IS TRUE")
            ->count();

        return 1 - ($totalTrue / IloItem::count());
    }
}
