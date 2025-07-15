<?php

namespace App\Providers;

use App\Contracts\TokenSnapshotInterface;
use App\Repositories\EloquentTokenRepository;
use App\Repositories\EloquentTokenSnapshotRepository;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
       $this->app->bind(TokenRepositoryInterface::class, EloquentTokenRepository::class);

       $this->app->bind(TokenSnapshotInterface::class, EloquentTokenSnapshotRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
