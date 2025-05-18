<?php

use Carbon\Carbon;
use Pratiksh\Nepalidate\Services\NepaliDate;

test('it can convert AD to BS date string', function () {
    $ad = Carbon::create(2024, 4, 13); // Known BS new year date
    $date = NepaliDate::create($ad);

    expect($date)->toBeInstanceOf(NepaliDate::class);
    expect($date->toBS())->toBe('2081-01-01');
});

test('it can return BS as an array', function () {
    $ad = Carbon::create(2024, 4, 13);
    $date = NepaliDate::fromAD($ad);
    $bsArray = $date->toBSArray();

    expect($bsArray)->toHaveKeys(['year', 'month', 'day', 'dayOfWeek']);
    expect($bsArray['year'])->toBe(2081);
    expect((int)$bsArray['month'])->toBe(1);
    expect((int)$bsArray['day'])->toBe(1);
});

test('it can return formatted English BS date', function () {
    $date = NepaliDate::create(Carbon::create(2024, 4, 13));
    expect($date->toFormattedEnglishBSDate())->toBe('1 Baisakh 2081, Saturday');
});
