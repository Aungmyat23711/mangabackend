<?php

namespace App\Providers;

use App\interfaces\GenreInterface;
use App\interfaces\MangaInterface;
use App\interfaces\ShopInterface;
use App\repositories\GenreRepository;
use App\repositories\MangaRepository;
use App\repositories\ShopRepository;
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
        $this->app->bind(ShopInterface::class, ShopRepository::class);
        $this->app->bind(GenreInterface::class,GenreRepository::class);
        $this->app->bind(MangaInterface::class,MangaRepository::class);
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
