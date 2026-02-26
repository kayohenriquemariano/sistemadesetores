<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\SetorServiceInterface;
use App\Services\SetorService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SetorServiceInterface::class, SetorService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
