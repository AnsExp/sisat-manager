<?php

namespace App\Modules\InformationAnalysis;

use App\Models\Company;
use App\Models\SisatActivity;
use App\Modules\ActivityItem;

class PpeEfficiencyEvaluation implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        $total = $activity->results()
            ->where('company_id', $company->id)
            ->count();

        if ($total === 0) {
            return 1;
        }

        $totalCurrent = $activity->results()
            ->where('company_id', $company->id)
            ->where('results->status', 'current')
            ->count();

        return $totalCurrent / $total;
    }
}
