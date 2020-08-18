<?php

namespace Microboard\Tests;

use Microboard\Providers\MicroboardServiceProvider;
use Orchestra\Testbench\TestCase;
use Microboard\Providers\MicroboardCoreServiceProvider;

abstract class IntegrationTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            MicroboardCoreServiceProvider::class,
            MicroboardServiceProvider::class
        ];
    }
}
