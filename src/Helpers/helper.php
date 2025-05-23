<?php

use Carbon\Carbon;
use Pratiksh\Nepalidate\Services\EnglishDate;
use Pratiksh\Nepalidate\Services\NepaliDate;

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

        if (! empty($bs_array) && is_array($bs_array)) {
            $json = json_encode($bs_array);
            if ($json !== false) {
                $to_detail_bs = json_decode($json);
            }
        }

        return $to_detail_bs;
    }
}
