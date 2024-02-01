<?php

use App\Actions\Company\CompanyDashboard;
use App\Http\Controllers\Company\ProjectController;
use App\Http\Controllers\Company\StatusController;
use App\Http\Controllers\Company\UserController;

Route::middleware('auth')->prefix('company')->as('company.')->group(function () {
    Route::get('dashboard', CompanyDashboard::class)->name('dashboard');

    // Users
    Route::resource('users', UserController::class);
    Route::post('users/{id}', [UserController::class, 'update'])->name('users.update');

    // Projects
    Route::resource('projects', ProjectController::class);
    Route::post('projects/{id}', [ProjectController::class, 'update'])->name('projects.update');

    // Status
    Route::resource('status', StatusController::class);
    Route::post('status/{id}', [StatusController::class, 'update'])->name('status.update');
});
