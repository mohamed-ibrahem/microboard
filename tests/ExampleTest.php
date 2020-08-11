<?php

namespace Devnile\MicroboardV2\Tests;

use Orchestra\Testbench\TestCase;
use Devnile\MicroboardV2\MicroboardV2ServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MicroboardV2ServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
