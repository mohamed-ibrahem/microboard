<?php

namespace Microboard\Tests\Unit;

use Microboard\Microboard;
use Microboard\Tests\Fixtures\User;
use Microboard\Tests\IntegrationTest;

class MicroboardTest extends IntegrationTest
{
    /** @test **/
    function it_loads_resources()
    {
        Microboard::resources($resources = [
            User::class
        ]);

        $this->assertCount(1, Microboard::resourceCollection());
        $this->assertEquals($resources, Microboard::availableResources()->all());
    }

    /** @test **/
    function it_returns_available_resources_for_navigation()
    {
        Microboard::resources($resources = [
            User::class
        ]);

        $this->assertNotEmpty(Microboard::availableResources());
        User::$displayInNavigation = false;
        $this->assertEmpty(Microboard::availableResources());
    }

    /** @test **/
    function it_get_resources_by_uri_key()
    {
        $uri = 'users';
        Microboard::resources($resources = [
            User::class
        ]);

        $this->assertEquals($uri, User::uriKey());
        $this->assertEquals(User::class, Microboard::resourceForKey($uri));
    }

    /** @test **/
    function it_return_admin_path()
    {
        config()->set('microboard.path', $path = 'microboard');
        $this->assertEquals($path, Microboard::path());
    }
}
