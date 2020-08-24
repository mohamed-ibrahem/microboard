<?php

namespace Microboard\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Microboard\Microboard;

class MicroboardRouteServiceProvider extends ServiceProvider
{
    /**
     * Microboard controllers namespace.
     *
     * @var string
     */
    protected $namespace = 'Microboard\Http\Controllers';

    /**
     * Define route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Route::middlewareGroup('microboard', config('microboard.middleware', []));

        Route::bind('resource', function($value) {
            return tap(Microboard::resourceForKey($value), function($resource) {
                abort_if(is_null($resource), 404);
            });
        });
    }

    /**
     * Define the Microboard routes.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
    }

    /**
     * Define the Microboard "web" routes.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware(['microboard', 'web'])
            ->namespace($this->namespace)
            ->prefix(Microboard::path())
            ->name('microboard.')
            ->group(__DIR__ . '/../../routes/web.php');
    }
}
