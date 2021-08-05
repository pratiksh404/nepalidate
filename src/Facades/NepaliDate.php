<?php

namespace Pratiksh\Nepalidate\Facades;

use Illuminate\Support\Facades\Facade;

class NepaliDate extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'nepalidate';
    }
}
