<?php

namespace Microboard\Tests\Unit;

use Microboard\Microboard;
use Microboard\Tests\Fixtures\UserResource;
use Microboard\Tests\IntegrationTest;

class MicroboardTest extends IntegrationTest
{
    /** @test */
    function it_loads_resources()
    {
        $this->assertCount(1, Microboard::resourceCollection());
    }

    /** @test */
    function it_get_resources_by_uri_key()
    {
        $this->assertEquals($uri = 'users', UserResource::uriKey());
        $this->assertEquals(UserResource::class, Microboard::resourceForKey($uri));
    }

    /** @test */
    function it_return_admin_path()
    {
        config()->set('microboard.path', $path = 'microboard');
        $this->assertEquals($path, Microboard::path());
    }
}
