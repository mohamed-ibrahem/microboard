<?php

namespace Microboard\Providers;

use Illuminate\Support\ServiceProvider;

class MicroboardCoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }

        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'microboard');
        }

        $this->registerResources();
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        //
    }

    /**
     * Register the package resources such as routes, templates, etc.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'microboard');
        // $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'microboard');
        // $this->loadJsonTranslationsFrom(resource_path('lang/vendor/microboard'));
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(MicroboardViewsServiceProvider::class);
        $this->app->register(MicroboardRouteServiceProvider::class);
    }
}
