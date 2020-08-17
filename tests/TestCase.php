<?php

namespace Microboard\Tests;

use Orchestra\Testbench\TestCase as Testbench;
use Microboard\Providers\MicroboardCoreServiceProvider;

class TestCase extends Testbench
{
    protected function getPackageProviders($app)
    {
        return [MicroboardCoreServiceProvider::class];
    }
}
