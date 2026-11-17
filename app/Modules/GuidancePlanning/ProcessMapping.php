<?php

namespace App\Modules\GuidancePlanning;

use App\Models\Company;

class ProcessMapping
{
    protected $code = 'process_mapping';

    public function __construct(private readonly Company $company) {}
}
