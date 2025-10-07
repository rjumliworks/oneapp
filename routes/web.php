<?php

use Illuminate\Support\Facades\Route;

Route::get('/dtr', [App\Http\Controllers\Hr\DtrController::class, 'dtr']);
Route::post('/dtr', [App\Http\Controllers\Hr\DtrController::class, 'store']);

Route::middleware(['2fa','auth','verified'])->group(function () {
    Route::resource('/profile', App\Http\Controllers\Auth\ProfileController::class);
    Route::get('/search', [App\Http\Controllers\DashboardController::class, 'search']);
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    
    Route::get('/requests/{type}/{id}', [App\Http\Controllers\Employee\RequestController::class, 'type']);

    Route::resource('/approvals', App\Http\Controllers\Employee\ApprovalController::class);
    Route::resource('/requests', App\Http\Controllers\Employee\RequestController::class);
    Route::resource('/schedules', App\Http\Controllers\Employee\ScheduleController::class);
    Route::resource('/surveys', App\Http\Controllers\Hr\SurveyController::class);
    Route::post('/comment', [App\Http\Controllers\Common\CommentController::class, 'store']);

    Route::middleware(['role:Human Resource Officer'])->group(function () {
        Route::resource('/employees', App\Http\Controllers\Hr\EmployeeController::class);
        Route::resource('/dtrs', App\Http\Controllers\Hr\DtrController::class);
        Route::resource('/payrolls', App\Http\Controllers\Hr\PayrollController::class);
        Route::resource('/credits', App\Http\Controllers\Hr\CreditController::class);
        Route::resource('/calendar', App\Http\Controllers\Hr\CalendarController::class);
        Route::resource('/leaves', App\Http\Controllers\Hr\LeaveController::class)->except(['store']);
        Route::resource('/cto', App\Http\Controllers\Hr\CtoController::class)->except(['store']);
    });

    // Route::middleware(['role:Travel Officer'])->group(function () {
        Route::resource('/travels', App\Http\Controllers\Vrams\TravelController::class)->except(['store']);
        Route::resource('/reservations', App\Http\Controllers\Vrams\ReservationController::class)->except(['store']);
    // });

    Route::middleware(['role:Document Control Officer'])->group(function () {
        Route::resource('/documents', App\Http\Controllers\Trace\DocumentController::class);
    });

    Route::middleware(['role:Administrator'])->group(function () {
        Route::resource('/users', App\Http\Controllers\Executive\UserController::class);
    });

    Route::resource('/equipments', App\Http\Controllers\Assests\EquipmentController::class);
    Route::resource('/buildings', App\Http\Controllers\Assests\BuildingController::class);

    Route::post('/leaves', [App\Http\Controllers\Hr\LeaveController::class, 'store']);
    Route::post('/travels', [App\Http\Controllers\Vrams\TravelController::class, 'store']);
    Route::post('/reservations', [App\Http\Controllers\Vrams\ReservationController::class, 'store']);
    Route::post('/cto', [App\Http\Controllers\Hr\CtoController::class, 'store']);

    Route::get('/keep-alive', function () {
        return response()->json(['status' => 'ok']);
    });

    // Route::resource('/executive', App\Http\Controllers\ExecutiveController::class);
});

require __DIR__.'/auth.php';
