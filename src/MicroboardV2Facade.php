<?php

namespace Devnile\MicroboardV2;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Devnile\MicroboardV2\Skeleton\SkeletonClass
 */
class MicroboardV2Facade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'microboard-v2';
    }
}
