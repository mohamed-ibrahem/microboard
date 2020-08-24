<?php

namespace Microboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class Resource
{
    use PerformsQueries,
        ResolveFields;

    /**
     * The underlying model resource instance.
     *
     * @var mixed|null
     */
    public $resource;

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
     * @param mixed $resource
     */
    public function __construct($resource = null)
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
     * The pagination per-page options configured for this resource.
     *
     * @return array
     */
    public static function perPageOptions()
    {
        return static::$perPageOptions;
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
     * @param mixed $id
     * @return $this
     */
    public static function newResourceWith($id)
    {
        return new static(
            static::newModel()->findOrFail($id)
        );
    }

    /**
     * Get a fresh instance of the model represented by the resource.
     *
     * @return Model
     */
    public static function newModel()
    {
        $model = static::$model;

        return new $model;
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
