<?php

namespace Microboard\Tests;

use Microboard\Tests\Microboard\User;

class ResourceTest extends TestCase
{
    /** @test **/
    function it_makes_a_uri_key()
    {
        $this->assertEquals('users', User::uriKey());
    }
}
