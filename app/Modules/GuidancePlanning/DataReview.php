<?php

namespace App\Modules\GuidancePlanning;

use App\Enums\WorkIncidentStatus;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Modules\ActivityItem;

class DataReview implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        $total = $activity->results()->where('company_id', $company->id)->count();
        $totalanAlized = $activity->results()
            ->where('company_id', $company->id)
            ->where('results->status', WorkIncidentStatus::ANALYZED->value)
            ->count();

        return $totalanAlized / $total;
    }
}
