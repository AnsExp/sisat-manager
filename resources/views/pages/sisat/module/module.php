<?php

use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use Livewire\Component;

new class extends Component
{
    private Company $company;

    private SisatModule $module;

    private SisatActivity $activity;

    public function mount(SisatModule $module, SisatActivity $activity, Company $company)
    {
        $this->module = $module;
        $this->company = $company;
        $this->activity = $activity;
    }

    public function render()
    {
        if (! $this->module->activities()->whereKey($this->activity->getKey())->exists()) {
            abort(403, 'La actividad no esta asociada al modulo SISAT indicado.');
        }

        $moduleSegment = str_replace('_', '-', $this->module->slug);
        $activitySegment = str_replace('_', '-', $this->activity->slug);

        $data = [
            'module' => $this->module,
            'company' => $this->company,
            'activity' => $this->activity,
            'livewire' => "pages::sisat.default-module",
        ];

        if ( View::exists("pages.sisat.{$moduleSegment}.{$activitySegment}.companies.{$this->company->slug}.{$this->company->slug}")) {
            $data['livewire'] = "pages::sisat.{$moduleSegment}.{$activitySegment}.companies.{$this->company->slug}";
        } else if ( View::exists("pages.sisat.{$moduleSegment}.{$activitySegment}.{$activitySegment}")) {
            $data['livewire'] = "pages::sisat.{$moduleSegment}.{$activitySegment}";
        }

        return view('pages.sisat.module.module', $data)
            ->title($this->company->name);
    }
};
