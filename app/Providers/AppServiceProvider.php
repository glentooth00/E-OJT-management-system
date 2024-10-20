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
        define('STATUS_PENDING', 'Pending');
        define('STATUS_APPROVED', 'Approved');
        define('STATUS_REGISTERED', 'Registered');
    }
}
