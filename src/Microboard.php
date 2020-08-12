<?php

namespace Microboard;

use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\Finder\Finder;

class Microboard
{
    /**
     * @var array
     */
    protected $resources = [];

    /**
     * @var array
     */
    protected $cards = [];

    /**
     * @param $directory
     * @throws ReflectionException
     */
    public function resourcesIn($directory)
    {
        $namespace = app()->getNamespace();

        $resources = [];

        foreach ((new Finder)->in($directory)->files() as $resource) {
            $resource = $namespace . str_replace(
                    ['/', '.php'],
                    ['\\', ''],
                    Str::after($resource->getPathname(), app_path() . DIRECTORY_SEPARATOR)
                );

            if (is_subclass_of($resource, Resource::class) &&
                !(new ReflectionClass($resource))->isAbstract()) {
                $resources[] = $resource;
            }
        }

        $this->resources(
            collect($resources)->sort()->all()
        );
    }

    /**
     * @param array $resources
     * @return Microboard
     */
    public function resources(array $resources)
    {
        $this->resources = array_unique(
            array_merge($this->resources, $resources)
        );

        return $this;
    }

    /**
     * Get the resource class name for a given key.
     *
     * @param  string  $key
     * @return string
     */
    public function resourceForKey($key)
    {
        return collect($this->resources)->first(function ($value) use ($key) {
            return $value::uriKey() === $key;
        });
    }

    /**
     * @param array $cards
     * @return Microboard
     */
    public function cards(array $cards)
    {
        $this->cards = array_merge(
            $this->cards,
            $cards
        );

        return $this;
    }
}
