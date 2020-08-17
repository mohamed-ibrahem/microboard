<?php

namespace Microboard\View\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Navbar extends Component
{
    /**
     * @var string
     */
    public $title;

    /**
     * @param string $title
     */
    public function mount($title)
    {
        $this->title = $title;
    }

    /**
     * Return view.
     *
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.navbar');
    }
}
