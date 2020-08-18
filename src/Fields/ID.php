<?php

namespace Microboard\Fields;

class ID extends Field
{
    /**
     * Create a new field.
     *
     * @param string|null $name
     * @param string|null $attribute
     * @param mixed|null $resolveCallback
     * @return void
     */
    public function __construct($name = null, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name ?? 'ID', $attribute, $resolveCallback);
    }
}
