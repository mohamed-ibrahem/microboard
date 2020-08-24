<?php

namespace Microboard\Http\Livewire;

trait DeferLoading
{
    /**
     * @var bool
     */
    public $readyToLoad = false;

    /**
     * Change readyToLoad status as soon as the component is rendered.
     *
     * @return void
     */
    public function load()
    {
        $this->readyToLoad = true;
    }
}
