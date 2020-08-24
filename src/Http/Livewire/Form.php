<?php

namespace Microboard\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Form extends Component
{
    use DeferLoading;

    /**
     * @var array
     */
    public $fields = [];

    /**
     * @var string
     */
    public $resource;

    /**
     * @var mixed
     */
    public $resourceId;

    /**
     * @param string $resource
     * @param mixed $resourceId
     */
    public function mount($resource, $resourceId = null)
    {
        $this->resource = $resource;
        $this->resourceId = $resourceId;
    }

    /**
     * Change readyToLoad status as soon as the component is rendered.
     */
    public function load()
    {
        $resource = $this->resource::newResourceWith($this->resourceId);
        $this->fields = $resource->updateFields(request());
        $this->readyToLoad = true;
    }

    /**
     * Submit the form.
     */
    public function submit()
    {
        $this->validate(
            collect($this->fields)->pluck('rules', 'key')->all()
        );
    }

    /**
     * Render the component's view.
     *
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.form');
    }
}
