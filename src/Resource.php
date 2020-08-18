<?php

namespace Microboard;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

abstract class Resource
{
    //// model/resource
    // label
    // displayInNavigation
    // group
    // icon
    // title field
    //// fields
    // cards
    // db queries
    // with
    // search
    // per page options

    /**
     * The underlying model resource instance.
     *
     * @var Model
     */
    public $resource;

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = true;

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = [];

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

    /**
     * The per-page options used the resource index.
     *
     * @var array
     */
    public static $perPageOptions = [1, 25, 50, 100];

    /**
     * Resource constructor.
     *
     * @param Model $resource
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param Request $request
     * @return array
     */
    abstract public function fields(Request $request);

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return Str::plural(Str::title(Str::snake(class_basename(get_called_class()), ' ')));
    }

    /**
     * Get the icon of the resource.
     *
     * @return string
     */
    public static function icon()
    {
        return 'fa fa-database text-primary';
    }

    /**
     * Determine if this resource is available for navigation.
     *
     * @return bool
     */
    public static function availableForNavigation()
    {
        return static::$displayInNavigation;
    }

    /**
     * The pagination per-page options configured for this resource.
     *
     * @return array
     */
    public static function perPageOptions()
    {
        return static::$perPageOptions;
    }

    /**
     * Get the searchable columns for the resource.
     *
     * @return array
     */
    public static function searchableColumns()
    {
        return empty(static::$search)
            ? [static::newModel()->getKeyName()]
            : static::$search;
    }

    /**
     * Get the URI key for the resource.
     *
     * @return string
     */
    public static function uriKey()
    {
        return Str::plural(Str::kebab(class_basename(get_called_class())));
    }

    /**
     * @param array $sort
     * @param int $perPage
     * @param string $search
     * @return Builder
     */
    public static function buildIndexQuery($sort, $perPage, $search)
    {
        return static::applyOrdering(
            static::applySearch(
                static::newModel()->newQuery()->with(static::$with),
                $search
            ), $sort[0], $sort[1])->tap(function ($query) use ($perPage) {
                return $query->paginate($perPage);
            });
    }

    /**
     * @param Builder $query
     * @param string $field
     * @param bool $asc
     * @return Builder
     */
    public static function applyOrdering($query, $field, $asc = true)
    {
        if (!$field) {
            return $query;
        }

        return $query->orderBy($field, $asc ? 'asc' : 'desc');
    }

    /**
     * Apply the search query to the query.
     *
     * @param Builder $query
     * @param string $search
     * @return Builder
     */
    public static function applySearch($query, $search)
    {
        if (!$search) {
            return $query;
        }

        return $query->where(function ($query) use ($search) {
            $model = $query->getModel();

            foreach (static::searchableColumns() as $column) {
                $query->orWhere($model->qualifyColumn($column), 'LIKE', '%'.$search.'%');
            }
        });
    }

    /**
     * @return Model
     */
    public static function newModel()
    {
        $model = static::$model;

        return new $model;
    }

    /**
     * @param Request $request
     * @return Collection
     */
    public function indexFields(Request $request)
    {
        return collect($this->fields($request))
            ->each(function ($field) {
                $field->resolveForDisplay($this->resource);
            });
    }

    /**
     * @param Request $request
     * @return array
     */
    public function serializeForIndex(Request $request)
    {
        $fields = $this->indexFields($request);

        return [
            // 'id' => $fields->whereInstanceOf('ID')->first(),
            'fields' => $fields->all(),
        ];
    }

    /**
     * Dynamically get properties from the underlying resource.
     *
     * @param string $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->resource->{$key};
    }
}
