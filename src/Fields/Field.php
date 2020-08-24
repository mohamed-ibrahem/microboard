<?php

namespace Microboard\Fields;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

abstract class Field
{
    use Metable, Visibilable;

    /**
     * The element's component.
     *
     * @var string
     */
    public $component;

    /**
     * The callback to be used to resolve the field's value.
     *
     * @var Closure
     */
    public $resolveCallback;

    /**
     * The resource associated with the field.
     *
     * @var \Microboard\Resource
     */
    public $resource;

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
     * The callback to be used for computed field.
     *
     * @var callable
     */
    protected $computedCallback;

    /**
     * Indicates if the field should be sortable.
     *
     * @var bool
     */
    public $sortable = false;

    /**
     * Field constructor.
     *
     * @param string|null $name
     * @param string|Closure|null $attribute
     * @param Closure|null $resolveCallback
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
     * Create a new element.
     *
     * @param mixed $attributes
     * @return static
     */
    public static function make(...$attributes)
    {
        return new static(...$attributes);
    }

    /**
     * Specify that this field should be sortable.
     *
     * @param  bool  $value
     * @return $this
     */
    public function sortable($value = true)
    {
        if (! $this->computed()) {
            $this->sortable = $value;
        }

        return $this;
    }

    /**
     * Get the component name for the field.
     *
     * @return string
     */
    public function component()
    {
        return sprintf('microboard::fields.%s', $this->component);
    }

    /**
     * Get input key.
     *
     * @return string
     */
    protected function key()
    {
        return "fields.{$this->attribute}.value";
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

        if (! $this->resolveCallback) {
            $this->value = $this->resolveAttribute($resource, $attribute);
        } elseif (is_callable($this->resolveCallback)) {
            tap($this->resolveAttribute($resource, $attribute), function ($value) use ($resource, $attribute) {
                $this->value = call_user_func($this->resolveCallback, $value, $resource, $attribute);
            });
        }
    }

    /**
     * Define the callback that should be used to resolve the field's value.
     *
     * @param callable $resolveCallback
     * @return Field
     */
    public function resolveUsing(callable $resolveCallback)
    {
        $this->resolveCallback = $resolveCallback;

        return $this;
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
     * Determine if the field is computed.
     *
     * @return bool
     */
    public function computed()
    {
        return (is_callable($this->attribute) && ! is_string($this->attribute)) ||
            $this->attribute == 'ComputedField';
    }

    /**
     * @return string[]
     */
    public function toArray()
    {
        return [
            'component' => $this->component(),
            'attribute' => $this->attribute,
            'key' => $this->key(),
            'name' => $this->name,
            'value' => $this->value,
            'meta' => $this->meta(),
            'sortable' => $this->sortable,
            'rules' => [
                'required',
            ],
        ];
    }
}
