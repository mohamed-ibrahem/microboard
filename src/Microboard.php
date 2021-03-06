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
     * Applications resource.
     *
     * @var array
     */
    protected static $resources = [];

    /**
     * Register all resource in this path.
     *
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
                ! (new ReflectionClass($resource))->isAbstract()) {
                $resources[] = $resource;
            }
        }

        static::resources(
            collect($resources)->sort()->all()
        );
    }

    /**
     * Merge given resources with actual resources.
     *
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
     * Make collection of registered resources.
     *
     * @return Collection
     */
    public static function resourceCollection()
    {
        return collect(static::$resources);
    }

    /**
     * Get single resource bu given key.
     *
     * @param string $uri
     * @return string
     */
    public static function resourceForKey($uri)
    {
        return static::resourceCollection()->first(function ($resource) use ($uri) {
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
