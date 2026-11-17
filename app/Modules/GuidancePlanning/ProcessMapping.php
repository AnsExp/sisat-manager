<?php

namespace App\Modules\GuidancePlanning;

use App\Models\Company;

class ProcessMapping
{
    protected $module = 'guidance_planning';

    protected $code = 'process_mapping';

    public function __construct(private readonly Company $company) {}

    public function processPercentage() {
        $total = $this->company->processes()->count();
        $checked = $this->company->processes()->where('checked', true)->count();
        return $checked / $total;
    }
}
