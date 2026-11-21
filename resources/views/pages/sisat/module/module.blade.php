<div>
    <livewire:dynamic-component :is="$livewire" :company="$company" :module="$module" :activity="$activity" :key="'sisat-' . $company->id . '-' . $module->id . '-' . $activity->id" />
</div>