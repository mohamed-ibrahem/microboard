<?php

namespace Microboard;

use Illuminate\Support\Facades\Facade as BaseFacade;

/**
 * @method static void resourcesIn(string $directory)
 * @method static void cards(array $cards)
 * @method static Resource resourceForKey(string $resource)
 */
class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Microboard';
    }
}
