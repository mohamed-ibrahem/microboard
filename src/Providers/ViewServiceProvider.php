<?php

namespace Microboard\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Microboard\View\Components\AppLayout;
use Microboard\View\Components\ArgonLayout;
use Microboard\View\Components\Navbar;
use Microboard\View\Livewire\GlobalSearch;
use Microboard\View\Livewire\Notifications;
use Microboard\View\Livewire\SidebarLinks;
use Microboard\View\Livewire\Table;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeComponents()
            ->registerLivewireComponents();
    }

    /**
     * @return ViewServiceProvider
     */
    public function registerBladeComponents()
    {
        Blade::components([
            'argon' => ArgonLayout::class,
            'app' => AppLayout::class,
            'navbar' => Navbar::class,
        ], 'microboard');

        return $this;
    }

    /**
     * @return ViewServiceProvider
     */
    public function registerLivewireComponents()
    {
        Livewire::component('sidebar-links', SidebarLinks::class);
        Livewire::component('global-search', GlobalSearch::class);
        Livewire::component('notifications', Notifications::class);
        Livewire::component('index-table', Table::class);

        return $this;
    }
}
