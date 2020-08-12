<?php

namespace MicroboardV2\Tests;

use Orchestra\Testbench\TestCase;
use Microboard\Providers\MicroboardCoreServiceProvider;

class ExampleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [MicroboardCoreServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
