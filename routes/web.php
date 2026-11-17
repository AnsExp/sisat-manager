<?php

use App\Enums\ConclutionType;
use App\Enums\EvaluationType;
use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

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

Route::get('/test', function () {
    return Pdf::loadView('documents.occupational-certificate', [
        'employee' => Employee::find(1),
        'conclutionType' => ConclutionType::FIT,
        'conclutionDetails' => 'Reducir el consumo de azucar.',
        'evaluationType' => EvaluationType::INCOME,
        'recommendations' => [
            'Hacer ejercicio',
            'Comer sano',
        ],
    ])->setPaper('A4', 'landscape')->stream();
});

require __DIR__.'/settings.php';
