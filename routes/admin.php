<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;

Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/companies', CompanyController::class);
});
