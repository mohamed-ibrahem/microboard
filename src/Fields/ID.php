<?php

namespace Microboard\Fields;

use Closure;
use Illuminate\Database\Eloquent\Model;

class ID extends Field
{
    /**
     * ID's component.
     *
     * @var string
     */
    public $component = 'text';

    /**
     * ID constructor.
     *
     * @param string|null $name
     * @param string|Closure|null $attribute
     * @param Closure|null $resolveCallback
     */
    public function __construct($name = null, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name ?? 'ID', $attribute, $resolveCallback);
    }

    /**
     * Create a new, resolved ID field for the given model.
     *
     * @param Model $model
     * @return ID
     */
    public static function forModel($model)
    {
        return tap(static::make('ID', $model->getKeyName()))->resolve($model);
    }
}
