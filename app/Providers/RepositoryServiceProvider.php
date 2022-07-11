<?php

namespace App\Providers;

use App\interfaces\AuthInterface;
use App\interfaces\EpisodeInterface;
use App\interfaces\FeedbackInterface;
use App\interfaces\GenreInterface;
use App\interfaces\ImageInterface;
use App\interfaces\MangaInterface;
use App\interfaces\ShopInterface;
use App\Models\Feedback;
use App\repositories\AuthRepository;
use App\repositories\EpisodeRepository;
use App\repositories\FeedbackRepository;
use App\repositories\GenreRepository;
use App\repositories\ImageRepository;
use App\repositories\MangaRepository;
use App\repositories\ShopRepository;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Extension\CommonMark\Renderer\Inline\ImageRenderer;

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
        $this->app->bind(EpisodeInterface::class,EpisodeRepository::class);
        $this->app->bind(ImageInterface::class,ImageRepository::class);
        $this->app->bind(AuthInterface::class,AuthRepository::class);
        $this->app->bind(FeedbackInterface::class,FeedbackRepository::class);
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
