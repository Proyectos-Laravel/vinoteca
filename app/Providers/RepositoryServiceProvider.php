<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Cart\SessionCartRepository;
use App\Repositories\Wine\EloquentWineRepository;
use App\Repositories\Cart\CartRepositoryInterface;
use App\Repositories\Wine\WineRepositoryInterface;
use App\Repositories\Category\EloquentCategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            EloquentCategoryRepository::class,
        );

        $this->app->bind(
            WineRepositoryInterface::class,
            EloquentWineRepository::class,
        );

        $this->app->bind(
            CartRepositoryInterface::class,
            SessionCartRepository::class,
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
