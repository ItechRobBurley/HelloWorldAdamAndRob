<?php

namespace App\Providers;

use App\Repositories\PlanetDistanceRepository\FromConfig\PlanetDistanceFromConfigRepository;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PlanetDistanceRepositoryInterface::class, PlanetDistanceFromConfigRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
