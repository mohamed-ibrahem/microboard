<?php

namespace Microboard\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Microboard\Microboard;

class MicroboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();

            $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
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
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'microboard');
        // $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'microboard');
        // $this->loadJsonTranslationsFrom(resource_path('lang/vendor/microboard'));

        $this->registerRoutes();
    }

    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'namespace' => 'Microboard\Http\Controllers',
            'as' => 'microboard.',
            'prefix' => Microboard::path(),
            'middleware' => 'microboard',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        });

        Route::group([
            'namespace' => 'Microboard\Http\Controllers\API',
            'as' => 'microboard.api.',
            'prefix' => 'microboard-api',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/../../routes/api.php');
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
