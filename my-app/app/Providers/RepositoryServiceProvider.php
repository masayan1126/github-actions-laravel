<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Zaico\Domain\User\Repository\UserRepository;
use Zaico\Domain\Stock\Repository\StockRepository;
use Zaico\Infrastructure\Stock\StockRepositoryImpl;
use Zaico\Infrastructure\User\UserRepositoryImpl;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepository::class, function ($app) {
            return new UserRepositoryImpl();
        });

        $this->app->singleton(StockRepository::class, function ($app) {
            return new StockRepositoryImpl();
        });
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
