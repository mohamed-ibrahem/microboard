<?php

namespace Microboard\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MicroboardCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->register(MicroboardServiceProvider::class);

        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../../config/config.php', 'microboard');
        }

        Route::middlewareGroup('microboard', config('microboard.middleware', []));
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
