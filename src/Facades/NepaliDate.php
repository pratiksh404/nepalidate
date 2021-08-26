<?php

namespace Pratiksh\Nepalidate\Facades;

use Illuminate\Support\Facades\Facade;

class NepaliDate extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'nepalidate';
    }

    /**
     * Resolve a new instance for the facade.
     *
     * @return mixed
     */
    public static function refresh()
    {
        static::clearResolvedInstance(static::getFacadeAccessor());

        return static::getFacadeRoot();
    }
}
