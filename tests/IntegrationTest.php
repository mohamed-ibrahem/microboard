<?php

namespace Microboard\Tests;

use Livewire\LivewireServiceProvider;
use Microboard\Microboard;
use Microboard\Providers\MicroboardCoreServiceProvider;
use Microboard\Providers\MicroboardServiceProvider;
use Microboard\Providers\ViewServiceProvider;
use Microboard\Tests\Fixtures\UserResource;
use Orchestra\Testbench\TestCase;

abstract class IntegrationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();
        $this->withFactories(__DIR__ . '/Factories');
//        $this->loadMigrationsFrom(__DIR__ . '/../database/');

        Microboard::resources([
            UserResource::class
        ]);
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            MicroboardCoreServiceProvider::class,
            MicroboardServiceProvider::class,
            ViewServiceProvider::class
        ];
    }
}
