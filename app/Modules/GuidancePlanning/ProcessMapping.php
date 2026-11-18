<?php

namespace App\Modules\GuidancePlanning;

use App\Models\Company;
use App\Models\SisatActivity;
use App\Modules\ActivityItem;

class ProcessMapping implements ActivityItem
{
    public function calculate(Company $company, SisatActivity $activity)
    {
        return 0;
    }
}
