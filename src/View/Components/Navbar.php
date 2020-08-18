<?php

namespace Microboard\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Navbar extends Component
{
    /**
     * @var string
     */
    public $title;

    /**
     * Navbar constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
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
        return view('microboard::components.navbar');
    }
}
