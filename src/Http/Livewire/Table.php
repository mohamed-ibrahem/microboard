<?php

namespace Microboard\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    public $resource;

    /**
     * @var int
     */
    public $perPage = null;

    /**
     * @var string
     */
    public $search = '';

    /**
     * @var string
     */
    public $sortField = null;

    /**
     * @var bool
     */
    public $ascSorting = null;

    /**
     * @var int[]
     */
    public $perPageOptions = [];

    /**
     * @var bool
     */
    public $readyToLoad = false;

    /**
     * @var string[]
     */
    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'ascSorting' => ['except' => 1],
        'perPage', 'sortField',
    ];

    /**
     * @param string $resource
     */
    public function mount($resource)
    {
        $this->resource = $resource;
        $this->perPageOptions = $resource::perPageOptions();
        $this->perPage = request('perPage', $this->perPageOptions[0]);;
        $this->ascSorting = request('ascSorting');
        $this->search = request('search');
        $this->sortField = request('sortField');
    }

    /**
     * Change readyToLoad status as soon as the component is rendered.
     *
     * @return void
     */
    public function load()
    {
        $this->readyToLoad = true;
    }

    /**
     * When component's attributes updating.
     *
     * @return void
     */
    public function updating()
    {
        $this->gotoPage(1);
    }

    /**
     * Sort resource's data with given field.
     *
     * @param $field
     */
    public function sortBy($field)
    {
        $this->ascSorting = (int)($this->sortField === $field ? ! $this->ascSorting : true);
        $this->sortField = $field;
    }

    /**
     * Return collaction of resource's data.
     *
     * @return mixed
     */
    public function getResources()
    {
        $resource = $this->resource;

        return tap($resource::buildIndexQuery(
            [$this->sortField => (bool)$this->ascSorting],
            $this->search,
            $this->perPage
        ), function ($paginator) use ($resource) {
            return $paginator->getCollection()->transform(function ($item) use ($resource) {
                return (new $resource($item))->indexFields(request());
            });
        });
    }

    /**
     * View path for pagination links.
     *
     * @return string
     */
    public function paginationView()
    {
        return 'microboard::layouts.partials.pagination-links';
    }

    /**
     * Navigate to resource's route with id.
     *
     * @param string $route
     * @param int $resourceId
     */
    public function gotTo($route, $resourceId)
    {
        $this->redirectRoute(
            "microboard.resource.{$route}",
            [
                'resource' => $this->resource::uriKey(),
                'resourceId' => $resourceId
            ]
        );
    }

    /**
     * Render the component's view.
     *
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.table', [
            'resources' => $this->readyToLoad ?
                $this->getResources() :
                []
        ]);
    }
}
