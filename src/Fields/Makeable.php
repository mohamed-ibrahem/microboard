<?php


namespace Microboard\Fields;


trait Makeable
{
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
}
