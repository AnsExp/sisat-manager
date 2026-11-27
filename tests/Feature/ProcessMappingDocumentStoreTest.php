<?php

use App\Enums\RiskLevel;
use App\Models\CIIU;
use App\Models\Company;
use App\Models\SisatActivity;
use App\Models\SisatModule;
use App\Models\SisatResult;
use App\Models\User;
use App\Modules\ActivityCalculator;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Livewire;

beforeEach(function () {
    Storage::fake('local');

    $ciiu = CIIU::forceCreate([
        'code' => 'C2511.01',
        'description' => 'Fabricación de estructuras metálicas',
        'level' => RiskLevel::HIGH,
    ]);

    $this->company = Company::forceCreate([
        'name' => 'Acme Corp',
        'slug' => 'acme-corp',
        'ruc' => '0991234567001',
        'ciiu_id' => $ciiu->id,
    ]);

    $module = SisatModule::forceCreate([
        'name' => '1. Orientación y Planificación',
        'slug' => 'guidance_planning',
    ]);

    $this->activity = SisatActivity::forceCreate([
        'sisat_module_id' => $module->id,
        'name' => 'Mapeo de procesos',
        'slug' => 'process_mapping',
        'responsable' => 'security_monitor',
        'rules' => [],
    ]);

    $this->actingAs(User::factory()->create());
});

test('storing a document updates the process record and re-keys the table row on processes-update', function () {
    Livewire::test('pages::sisat.guidance-planning.process-mapping.process-store', [
        'company' => $this->company,
        'activity' => $this->activity,
    ])
        ->set('name', 'Soldadura')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('processes-update');

    $result = SisatResult::latest('id')->first();
    $initialKey = $result->id.'-'.md5(json_encode($result->results));

    $table = Livewire::test('pages::sisat.guidance-planning.process-mapping.processes-table', [
        'company' => $this->company,
        'activity' => $this->activity,
    ]);

    $table->assertSee('Subir mapa')
        ->assertSeeHtml('wire:key="'.$initialKey.'"');

    $file = UploadedFile::fake()->create('mapa-soldadura.pdf', 20, 'application/pdf');

    Livewire::test('pages::sisat.guidance-planning.process-mapping.document-store', [
        'activity' => $this->activity,
    ])
        ->call('documentStore', $result->id)
        ->set('document', $file)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertSet('document', null)
        ->assertDispatched('processes-update');

    $result->refresh();
    $sha = $result->results['map']['sha256'];
    $updatedKey = $result->id.'-'.md5(json_encode($result->results));

    expect($result->results['map']['path'])->not->toBeNull()
        ->and($sha)->toHaveLength(64)
        ->and($updatedKey)->not->toBe($initialKey);

    Storage::disk('local')->assertExists($result->results['map']['path']);

    $table->dispatch('processes-update')
        ->assertDontSee('Subir mapa')
        ->assertSee(Str::limit($sha, 16, '…'))
        ->assertSeeHtml('wire:key="'.$updatedKey.'"');

    expect(ActivityCalculator::calculate($this->company, $this->activity))->toBe(1.0);
});
