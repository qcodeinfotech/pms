<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Spatie\Flash\Flash::levels([
            'success' => 'alert alert-success',
            'warning' => 'alert alert-warning',
            'error' => 'alert alert-danger',
        ]);
    }
}
