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
    expect((int) $bsArray['month'])->toBe(1);
    expect((int) $bsArray['day'])->toBe(1);
});

test('it can return formatted English BS date', function () {
    $date = NepaliDate::create(Carbon::create(2024, 4, 13));
    expect($date->toFormattedEnglishBSDate())->toBe('1 Baisakh 2081, Saturday');
});

test('it can convert AD to BS date for year 2083', function () {
    $newYear = Carbon::create(2026, 4, 14);
    expect(NepaliDate::create($newYear)->toBS())->toBe('2083-01-01');

    $kartik6 = Carbon::create(2026, 10, 23);
    expect(NepaliDate::create($kartik6)->toBS())->toBe('2083-07-06');
});

