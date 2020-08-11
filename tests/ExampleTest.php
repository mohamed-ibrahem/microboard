<?php

namespace MicroboardV2\Tests;

use Orchestra\Testbench\TestCase;
use Microboard\MicroboardServiceProvider;

class ExampleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [MicroboardServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
