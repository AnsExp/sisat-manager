<?php

namespace App\Modules;

use App\Models\Company;
use App\Models\SisatActivity;

interface ActivityItem
{
    /**
     * @return float
     */
    public function calculate(Company $company, SisatActivity $activity);
}
