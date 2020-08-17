<?php

namespace Microboard;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionException;
use Symfony\Component\Finder\Finder;

class Microboard
{
    /**
     * @var array
     */
    protected static $resources = [];

    /**
     * @param $directory
     * @throws ReflectionException
     */
    public static function resourcesIn($directory)
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

        static::resources(
            collect($resources)->sort()->all()
        );
    }

    /**
     * @param array $resources
     * @return Microboard
     */
    public static function resources(array $resources)
    {
        static::$resources = array_unique(
            array_merge(static::$resources, $resources)
        );

        return new static;
    }

    /**
     * Make collection of registered resources
     *
     * @return Collection
     */
    public static function resourceCollection()
    {
        return collect(static::$resources);
    }

    /**
     * Return available resources for navigation
     *
     * @return Collection
     */
    public static function availableResources()
    {
        return static::resourceCollection()->filter(function($resource) {
            return $resource::availableForNavigation();
        });
    }

    /**
     * @param string $uri
     * @return string
     */
    public static function resourceForKey($uri)
    {
        return static::resourceCollection()->first(function($resource) use($uri) {
            return $resource::uriKey() === $uri;
        });
    }

    /**
     * Get the URI path prefix utilized by Nova.
     *
     * @return string
     */
    public static function path()
    {
        return config('microboard.path', '/admin');
    }
}
