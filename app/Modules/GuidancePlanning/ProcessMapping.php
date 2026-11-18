<?php

namespace App\Modules\GuidancePlanning;

use App\Models\Company;
use App\Models\SisatActivity;
use App\Modules\ActivityItem;

class ProcessMapping implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        $results = $activity->results()->where('company_id', $company->id)->get();
        $total = $results->count();
        if ($total === 0) {
            return 0;
        }
        $checked = 0;
        foreach ($results as $result) {
            if ($result->results['checked']) {
                $checked++;
            }
        }

        return $checked / $total;
    }
}
