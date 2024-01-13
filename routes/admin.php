<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;

Route::middleware('auth')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/comapnies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/comapnies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/comapnies', [CompanyController::class, 'store'])->name('companies.store');
});
