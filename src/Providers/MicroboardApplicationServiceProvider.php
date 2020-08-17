<?php

namespace Microboard\Providers;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Microboard\Microboard;
use Microboard\MicroboardExceptionHandler;

class MicroboardApplicationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // $this->registerExceptionHandler();
        $this->resources();
        // $this->authorization(); // TODO:: make it real.
    }

    /**
     * Register the application's resources.
     *
     * @return void
     */
    protected function resources()
    {
        Microboard::resourcesIn(app_path('Microboard'));
    }

    /**
     * Register Nova's custom exception handler.
     *
     * @return void
     */
    protected function registerExceptionHandler()
    {
        $this->app->bind(ExceptionHandler::class, MicroboardExceptionHandler::class);
    }

    /**
     * Register the gate.
     * This gate determines who can access Microboard dashboard.
     *
     * @return void
     */
    protected function authorization()
    {
        Gate::define('viewMicroboard', function ($user) {
            // return $user->permissions()->contains('viewMicroboard');
        });
    }

    /**
     * Get the cards that should be displayed on the dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [];
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(ViewServiceProvider::class);
    }
}
