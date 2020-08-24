<?php

namespace Microboard\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Notifications extends Component
{
    /**
     * Render the component's view.
     *
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.notifications');
    }
}
