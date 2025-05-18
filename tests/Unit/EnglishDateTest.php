<?php

use Carbon\Carbon;
use Pratiksh\Nepalidate\Services\EnglishDate;

test('it converts BS date string to AD using create()', function () {
    $date = EnglishDate::create('2081-01-01');

    expect($date)->toBeInstanceOf(EnglishDate::class);
    expect($date->toCarbon()->format('Y-m-d'))->toBe('2024-04-14');
});

test('it converts BS date string to AD using fromBS()', function () {
    $date = EnglishDate::fromBS('2081/01/01');

    expect($date)->toBeInstanceOf(EnglishDate::class);
    expect($date->toCarbon()->format('Y-m-d'))->toBe('2024-04-14');
});

test('it throws exception for invalid date format in create()', function () {
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Invalid date format');

    EnglishDate::create('2081-01');
});

test('it throws exception for invalid date format in fromBS()', function () {
    $this->expectException(Exception::class);
    $this->expectExceptionMessage('Invalid date format');

    EnglishDate::fromBS('2081/01');
});

test('it correctly sets AD Carbon date after conversion', function () {
    $bs = '2081-01-01';
    $englishDate = EnglishDate::create($bs);
    $carbon = $englishDate->toCarbon();

    expect($carbon)->toBeInstanceOf(Carbon::class);
    expect($carbon->format('Y-m-d'))->toBe('2024-04-14');
});
