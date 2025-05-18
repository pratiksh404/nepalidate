<?php

use Carbon\Carbon;
use Pratiksh\Nepalidate\Services\EnglishDate;
use Pratiksh\Nepalidate\Services\NepaliDate;

if (! function_exists('nepaliDate')) {
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

if (! function_exists('toFormattedBSDate')) {
    function toFormattedBSDate(Carbon $date)
    {
        return NepaliDate::create($date)->toFormattedEnglishBSDate();
    }
}

if (! function_exists('toFormattedNepaliDate')) {
    function toFormattedNepaliDate(Carbon $date)
    {
        return NepaliDate::create($date)->toFormattedNepaliBSDate();
    }
}

if (! function_exists('toAD')) {
    function toAD(string $date)
    {
        return EnglishDate::create($date)->toCarbon();
    }
}

if (! function_exists('toBS')) {
    function toBS(Carbon $date)
    {
        return NepaliDate::create($date)->toBS();
    }
}

if (! function_exists('toFormattedEnglishBSDate')) {
    function toFormattedEnglishBSDate(Carbon $date)
    {
        return NepaliDate::create($date)->toFormattedEnglishBSDate();
    }
}

if (! function_exists('toFormattedNepaliBSDate')) {
    function toFormattedNepaliBSDate(Carbon $date)
    {
        return NepaliDate::create($date)->toFormattedNepaliBSDate();
    }
}

if (! function_exists('toDetailBS')) {
    function toDetailBS(Carbon $date)
    {
        $bs_array = NepaliDate::create($date)->toBSArray();
        $to_detail_bs = null;
        if (! is_null($bs_array)) {
            if (is_array($bs_array)) {
                if (count($bs_array) > 0) {
                    $to_detail_bs = json_decode(json_encode($bs_array));
                }
            }
        }

        return $to_detail_bs;
    }
}
