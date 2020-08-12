<?php

namespace Microboard;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Microboard\Http\Requests\MicroboardRequest;

abstract class Resource
{
    /**
     * The underlying model resource instance.
     *
     * @var Model
     */
    public $resource;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

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
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = true;

    /**
     * Create a new resource instance.
     *
     * @param  Model  $resource
     * @return void
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
     * Get the underlying model instance for the resource.
     *
     * @return Model
     */
    public function model()
    {
        return $this->resource;
    }

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
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return Str::singular(static::label());
    }

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return $this->{static::$title};
    }

    /**
     * Get a fresh instance of the model represented by the resource.
     *
     * @return mixed
     */
    public static function newModel()
    {
        $model = static::$model;

        return new $model;
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
     * Return the location to redirect the user after creation.
     *
     * @param  MicroboardRequest  $request
     * @param  Resource  $resource
     * @return string
     */
    public static function redirectAfterCreate(MicroboardRequest $request, $resource)
    {
        return '/resources/'.static::uriKey().'/'.$resource->getKey();
    }

    /**
     * Return the location to redirect the user after update.
     *
     * @param  MicroboardRequest  $request
     * @param  Resource  $resource
     * @return string
     */
    public static function redirectAfterUpdate(MicroboardRequest $request, $resource)
    {
        return '/resources/'.static::uriKey().'/'.$resource->getKey();
    }

    /**
     * Return the location to redirect the user after deletion.
     *
     * @param  MicroboardRequest  $request
     * @return string
     */
    public static function redirectAfterDelete(MicroboardRequest $request)
    {
        return '/resources/'.static::uriKey();
    }

    /**
     * Return a fresh resource instance.
     *
     * @return Resource
     */
    protected static function newResource()
    {
        return new static(static::newModel());
    }
}
