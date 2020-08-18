<?php

namespace Microboard\View\Livewire;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

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
    public $ascSorting = 1;

    /**
     * @var string
     */
    public $resource;

    /**
     * @var int[]
     */
    public $perPageOptions = [];

    /**
     * @var string[]
     */
    protected $updatesQueryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 25],
        'ascSorting' => ['except' => 1],
        'sortField',
    ];

    /**
     * @param string $resource
     */
    public function mount($resource)
    {
        $this->resource = $resource;
        $this->perPageOptions = $resource::perPageOptions();
        $this->perPage = request('perPage', $this->perPageOptions[0]);
        $this->search = request('search');
        $this->sortField = request('sortField');
        $this->ascSorting = request('ascSorting', 1);
    }

    /**
     * @return void
     */
    public function updating()
    {
        $this->gotoPage(1);
    }

    /**
     * @param $field
     */
    public function sortBy($field)
    {
        $this->ascSorting = (int)($this->sortField === $field ? !$this->ascSorting : true);
        $this->sortField = $field;
    }

    /**
     * @return View
     */
    public function render()
    {
        return view('microboard::livewire.table', [
            'resources' => $this->getResources(),
        ]);
    }

    /**
     * @return LengthAwarePaginator
     */
    protected function getResources()
    {
        $resource = $this->resource;

        return tap(
            $resource::buildIndexQuery(
                [$this->sortField, (bool)$this->ascSorting],
                $this->perPage,
                $this->search
            ),
            function ($paginator) use ($resource) {
                return $paginator->getCollection()->transform(function ($item) use ($resource) {
                    return (new $resource($item))->serializeForIndex(request());
                });
            }
        );
    }
}
