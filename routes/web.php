<?php

use Illuminate\Support\Facades\Route;

Route::get('/dtr', [App\Http\Controllers\Hr\DtrController::class, 'dtr']);
Route::post('/dtr', [App\Http\Controllers\Hr\DtrController::class, 'store']);

Route::middleware(['2fa','auth','verified'])->group(function () {
    Route::resource('/profile', App\Http\Controllers\Auth\ProfileController::class);
    Route::get('/search', [App\Http\Controllers\DashboardController::class, 'search']);
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::middleware(['role:Human Resource Officer'])->group(function () {
        Route::resource('/employees', App\Http\Controllers\Hr\EmployeeController::class);
        Route::resource('/dtrs', App\Http\Controllers\Hr\DtrController::class);
        Route::resource('/surveys', App\Http\Controllers\Hr\SurveyController::class);
        Route::resource('/leaves', App\Http\Controllers\Hr\LeaveController::class);
        Route::resource('/calendar', App\Http\Controllers\Hr\CalendarController::class);
    });

    Route::middleware(['role:Document Control Officer'])->group(function () {
        Route::resource('/documents', App\Http\Controllers\Trace\DocumentController::class);
    });

    // Route::resource('/executive', App\Http\Controllers\ExecutiveController::class);
});

require __DIR__.'/auth.php';
