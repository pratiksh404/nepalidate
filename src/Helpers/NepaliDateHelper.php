<?php

use Pratiksh\Nepalidate\Facades\NepaliDate;
use Carbon\Carbon;

if (!function_exists('toBS')) {
    function toBS(Carbon $date)
    {
        return NepaliDate::create($date)->toBS();
    }
}

if (!function_exists('toFormattedBSDate')) {
    function toFormattedBSDate(Carbon $date)
    {
        return NepaliDate::create($date)->toFormattedBSDate();
    }
}

if (!function_exists('toFormattedNepaliDate')) {
    function toFormattedNepaliDate(Carbon $date)
    {
        return NepaliDate::create($date)->toFormattedNepaliDate();
    }
}
