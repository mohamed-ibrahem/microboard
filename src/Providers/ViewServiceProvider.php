<?php

namespace Microboard\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
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
        Livewire::component('sidebar-links', SidebarLinks::class);
        Livewire::component('global-search', GlobalSearch::class);
        Livewire::component('notifications', Notifications::class);
        Livewire::component('index-table', Table::class);
    }
}
