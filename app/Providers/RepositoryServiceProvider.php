<?php

namespace App\Providers;

use App\Repositories\UserRepository;
use App\Services\AuthService;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Register repositories
        $this->app->singleton(UserRepository::class, function ($app) {
            return new UserRepository();
        });

        // Register services
        $this->app->singleton(AuthService::class, function ($app) {
            return new AuthService($app->make(UserRepository::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

