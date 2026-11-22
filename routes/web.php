<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::livewire('/sisat/{module:slug}/{activity:slug}/{company}', 'pages::sisat.module')
        // ->withoutScopedBindings()
        ->name('sisat.activity');

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

Route::view('/test', 'test');

require __DIR__.'/settings.php';
