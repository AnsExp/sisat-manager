<?php

use App\Enums\RiskLevel;
use App\Enums\WorkStaff;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\User;

it('renders an activity when its module is not a company child', function () {
    $ciiu = CIIU::forceCreate([
        'code' => 'TEST-001',
        'description' => 'Test company classification',
        'level' => RiskLevel::LOW,
    ]);
    $company = Company::forceCreate([
        'name' => 'Test company',
        'ruc' => '12345678901',
        'ciiu_id' => $ciiu->getKey(),
    ]);
    $module = SisatModule::create([
        'name' => 'Information analysis',
        'slug' => 'information_analysis',
    ]);
    $activity = SisatActivity::forceCreate([
        'sisat_module_id' => $module->getKey(),
        'name' => 'Work hazard baseline',
        'slug' => 'work_hazard_baseline',
        'responsable' => WorkStaff::SECURITY_MONITOR,
        'rules' => [],
    ]);
    $guidanceModule = SisatModule::create([
        'name' => 'Guidance planning',
        'slug' => 'guidance_planning',
    ]);
    SisatActivity::forceCreate([
        'sisat_module_id' => $guidanceModule->getKey(),
        'name' => 'Management planning',
        'slug' => 'management_planning',
        'responsable' => WorkStaff::SECURITY_MONITOR,
        'rules' => [],
    ]);

    $response = $this->actingAs(User::factory()->create())
        ->withoutVite()
        ->get("/sisat/{$company->getKey()}/{$module->slug}/{$activity->slug}");

    $response->assertOk();
    $response->assertSee($company->name);
});

it('forbids an activity that belongs to a different module', function () {
    $ciiu = CIIU::forceCreate([
        'code' => 'TEST-002',
        'description' => 'Test company classification',
        'level' => RiskLevel::LOW,
    ]);
    $company = Company::forceCreate([
        'name' => 'Test company',
        'ruc' => '10987654321',
        'ciiu_id' => $ciiu->getKey(),
    ]);
    $module = SisatModule::create([
        'name' => 'Information analysis',
        'slug' => 'information_analysis',
    ]);
    $otherModule = SisatModule::create([
        'name' => 'Preventive actions',
        'slug' => 'preventive_actions',
    ]);
    $activity = SisatActivity::forceCreate([
        'sisat_module_id' => $otherModule->getKey(),
        'name' => 'Safety plans',
        'slug' => 'safety_plans',
        'responsable' => WorkStaff::SECURITY_MONITOR,
        'rules' => [],
    ]);

    $response = $this->actingAs(User::factory()->create())
        ->get("/sisat/{$company->getKey()}/{$module->slug}/{$activity->slug}");

    $response->assertForbidden();
});
