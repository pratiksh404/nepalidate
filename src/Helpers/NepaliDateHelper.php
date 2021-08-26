<?php

use Carbon\Carbon;
use Pratiksh\Nepalidate\Services\NepaliDate;

if (!function_exists('nepaliDate')) {
    function nepaliDate(Carbon $date)
    {
        $mode = config('nepalidate.mode', 1);
        if ($mode == 1) {
            return toBS($date);
        } elseif ($mode == 2) {
            return toFormattedBSDate($date);
        } elseif ($mode == 3) {
            return toFormattedNepaliDate($date);
        } else {
            return toBS($date);
        }
    }
}

if (!function_exists('toBS')) {
    function toBS(Carbon $date)
    {
        return (new NepaliDate())->create($date)->toBS();
    }
}

if (!function_exists('toFormattedBSDate')) {
    function toFormattedBSDate(Carbon $date)
    {
        return (new NepaliDate())->create($date)->toFormattedBSDate();
    }
}

if (!function_exists('toFormattedNepaliDate')) {
    function toFormattedNepaliDate(Carbon $date)
    {
        return (new NepaliDate())->create($date)->toFormattedNepaliDate();
    }
}
