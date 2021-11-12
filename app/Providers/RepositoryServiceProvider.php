<?php

namespace App\Providers;

use App\Repository\CountryRepositoryInterface;
use App\Repository\Eloquent\CountryRepository;
use App\Repository\TeamRepositoryInterface;
use App\Repository\Eloquent\TeamRepository;
use App\Repository\PlayerRepositoryInterface;
use App\Repository\Eloquent\PlayerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CountryRepositoryInterface::class, CountryRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
        $this->app->bind(PlayerRepositoryInterface::class, PlayerRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
