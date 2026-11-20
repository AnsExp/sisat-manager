<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::prefix('/sisat')->group(function () {
        Route::prefix('/{company}/guidance_planning')->group(function () {
            Route::livewire('/data_review', 'pages::sisat.guidance-planning.data-review')->name('sisat.guidance-planning.data-review');
            Route::livewire('/process_mapping', 'pages::sisat.guidance-planning.process-mapping')->name('sisat.guidance-planning.process-mapping');
            Route::livewire('/mental_diagnosis', 'pages::sisat.guidance-planning.mental-diagnosis')->name('sisat.guidance-planning.mental-diagnosis');
            Route::livewire('/general_diagnosis', 'pages::sisat.guidance-planning.general-diagnosis')->name('sisat.guidance-planning.general-diagnosis');
            Route::livewire('/physical_diagnosis', 'pages::sisat.guidance-planning.physical-diagnosis')->name('sisat.guidance-planning.physical-diagnosis');
            Route::livewire('/management_planning', 'pages::sisat.guidance-planning.management-planning')->name('sisat.guidance-planning.management-planning');
        });
    });

    Route::prefix('/companies')->group(function () {

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
