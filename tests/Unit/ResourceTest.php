<?php

namespace Microboard\Tests\Unit;

use Microboard\Tests\Fixtures\UserResource;
use Microboard\Tests\IntegrationTest;

class ResourceTest extends IntegrationTest
{
    /** @test */
    function it_makes_a_uri_key()
    {
        $this->assertEquals('users', UserResource::uriKey());
    }

    /** @test */
    function it_makes_a_label()
    {
        $this->assertEquals('Users', UserResource::label());
    }
}
