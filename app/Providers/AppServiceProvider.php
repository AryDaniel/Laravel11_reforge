<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\DataBase\Eloquent\Model;

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
        // This line disables lazy loading entirely.
        // It will show an error if lazy loading is attempted.
        Model::preventLazyLoading();
        // A warning exists for "preventsLazyLoading" (with an 's'); this returns a boolean.
    

        // Add this if you don't see the Tailwind styles and want to create your own.
        //Paginator::useBootstrapfive();
    }
}
