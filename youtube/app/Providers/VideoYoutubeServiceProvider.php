<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class VideoYoutubeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('extractor','App\Services\YoutubeLoader');
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
