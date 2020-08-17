<?php

namespace Microboard\View\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Microboard\Facade;

class Notifications extends Component
{
    /**
     * Return view.
     *
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.notifications');
    }
}
