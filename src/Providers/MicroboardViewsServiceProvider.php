<?php

namespace Microboard\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire as Register;
use Microboard\Http\Livewire;

class MicroboardViewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Register::component('sidebar-links', Livewire\SidebarLinks::class);
        Register::component('global-search', Livewire\GlobalSearch::class);
        Register::component('notifications', Livewire\Notifications::class);
        Register::component('datatable', Livewire\Table::class);
        Register::component('form', Livewire\Form::class);
    }
}
