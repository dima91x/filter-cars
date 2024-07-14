<?php

namespace App\Providers;

use App\Services\CarServiceProxy;
use App\Services\Interfaces\CarServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CarServiceInterface::class,
            CarServiceProxy::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
