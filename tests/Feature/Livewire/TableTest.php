<?php

namespace Microboard\Tests\Feature\Livewire;

use Livewire\Livewire;
use Microboard\Tests\Fixtures\User;
use Microboard\Tests\Fixtures\UserResource;
use Microboard\Tests\IntegrationTest;

class TableTest extends IntegrationTest
{
    /**
     * @return \Livewire\Testing\Concerns\MakesCallsToComponent
     */
    protected function table()
    {
        return Livewire::test('datatable', [
            'resource' => UserResource::class,
        ])
            ->set('readyToLoad', true)
            ->set('perPage', 25);
    }

    /** @test */
    function it_fetches_data_by_given_resource()
    {
        $user = factory(User::class)->create();

        $this->table()->assertSee($user->name);
    }

    /** @test */
    function it_searches_into_given_resource()
    {
        factory(User::class)->create([
            'name' => 'Bar'
        ]);
        factory(User::class)->create([
            'name' => $name = 'Mohamed Ibrahim'
        ]);

        $this->table()
            ->assertSee('Bar')
            ->set('search', 'Mohamed')
            ->assertSee('page', 1)
            ->assertSee($name)
            ->assertDontSee('Bar');
    }
}
