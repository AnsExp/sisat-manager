<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('/companies')->group(function () {

        Route::prefix('/{company}/guidance_planning')->group(function () {
            Route::livewire('/process_mapping', 'pages::companies.sisat.guidance-planning.process-mapping')->name('companies.guidance-planning.process-mapping');
            Route::livewire('/general_diagnosis', 'pages::companies.sisat.guidance-planning.general-diagnosis')->name('companies.guidance-planning.general-diagnosis');
            Route::livewire('/physical_diagnosis', 'pages::companies.sisat.guidance-planning.physical-diagnosis')->name('companies.guidance-planning.physical-diagnosis');
        });

        Route::livewire('/', 'pages::companies.index')->name('companies.index');
        Route::livewire('/{company}', 'pages::companies.show')->name('companies.show');
        Route::livewire('/{company}/{workspace}', 'pages::companies.show')->name('companies.show.workspace');
        Route::livewire('/{company}/{workspace}/{position}', 'pages::companies.show')->name('companies.show.workspace.position');

    });

    Route::prefix('/employees')->group(function () {
        Route::livewire('/{employee}', 'pages::employees.show')->name('employees.show');
    });
});

use Barryvdh\DomPDF\Facade\Pdf;

Route::get('/test', fn () => Pdf::loadView('test')->stream());

require __DIR__.'/settings.php';
