<?php

namespace Microboard\Fields;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Microboard\Resource;

abstract class Field
{
    use Makeable;

    /**
     * The displayable name of the field.
     *
     * @var string
     */
    public $name;

    /**
     * The attribute / column name of the field.
     *
     * @var string
     */
    public $attribute;

    /**
     * The field's resolved value.
     *
     * @var mixed
     */
    public $value;

    /**
     * The resource associated with the field.
     *
     * @var Resource|null
     */
    public $resource;

    /**
     * The callback to be used to resolve the field's value.
     *
     * @var Closure
     */
    public $resolveCallback;

    /**
     * The callback to be used for computed field.
     *
     * @var callable
     */
    protected $computedCallback;

    /**
     * Create a new field.
     *
     * @param string|null $name
     * @param string|Closure|null $attribute
     * @param callback|null $resolveCallback
     */
    public function __construct($name = null, $attribute = null, $resolveCallback = null)
    {
        $this->name = $name;
        $this->resolveCallback = $resolveCallback;

        if ($attribute instanceof Closure ||
            (is_callable($attribute) && is_object($attribute))) {
            $this->computedCallback = $attribute;
            $this->attribute = 'ComputedField';
        } else {
            $this->attribute = $attribute ?? str_replace(' ', '_', Str::lower($name));
        }
    }

    /**
     * Resolve the field's value for display.
     *
     * @param Model $resource
     * @param null $attribute
     * @return void
     */
    public function resolveForDisplay($resource, $attribute = null)
    {
        $this->resource = $resource;

        $attribute = $attribute ?? $this->attribute;

        if ($attribute === 'ComputedField') {
            $this->value = call_user_func($this->computedCallback, $resource);

            return;
        }

        if (!$this->resolveCallback) {
            $this->value = $this->resolveAttribute($resource, $attribute);
        } elseif (is_callable($this->resolveCallback)) {
            tap($this->resolveAttribute($resource, $attribute), function ($value) use ($resource, $attribute) {
                $this->value = call_user_func($this->resolveCallback, $value, $resource, $attribute);
            });
        }
    }

    /**
     * Resolve the given attribute from the given resource.
     *
     * @param mixed $resource
     * @param string $attribute
     * @return mixed
     */
    public function resolveAttribute($resource, $attribute)
    {
        return data_get($resource, str_replace('->', '.', $attribute));
    }

    /**
     * Define the callback that should be used to resolve the field's value.
     *
     * @param callable $resolveCallback
     * @return $this
     */
    public function resolveUsing(callable $resolveCallback)
    {
        $this->resolveCallback = $resolveCallback;

        return $this;
    }
}
