<?php

namespace App\Modules\GuidancePlanning;

use App\Enums\ManagementPlanningStatus;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Modules\ActivityItem;

class ManagementPlanning implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        $total = $activity->results()->where('company_id', $company->id)->count();

        if ($total === 0) {
            return 0;
        }

        $totalanAlized = $activity->results()
            ->where('company_id', $company->id)
            ->where('results->status', ManagementPlanningStatus::AUTHORIZED->value)
            ->count();

        return $totalanAlized / $total;
    }
}
