<?php

namespace Microboard\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Microboard\Microboard;

class SidebarLinks extends Component
{
    /**
     * list of links.
     *
     * @var array
     */
    public $links = [];

    /**
     * Render the component's view.
     *
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.sidebar-links');
    }
}
