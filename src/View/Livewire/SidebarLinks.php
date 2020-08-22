<?php

namespace Microboard\View\Livewire;

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
     * Build menu with available resources.
     */
    public function buildMenuItems()
    {
        $this->links = Microboard::availableResources()->map(function ($resource) {
            return [
                'text' => $resource::label(),
                'icon' => $resource::icon(),
                'url' => route('microboard.resource.index', $resource::uriKey()),
            ];
        })->all();
    }

    /**
     * Return view.
     *
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.sidebar-links');
    }
}
