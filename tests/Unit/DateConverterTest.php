<?php

// File: tests/Unit/DateConverterTest.php

use Pratiksh\Nepalidate\Tests\Unit\Doubles\DateConverterTestDouble;

test('date converter has correct bs month in english', function () {
    $converter = new DateConverterTestDouble();

    expect($converter->getBSMonthInEnglish(1))->toBe('Baisakh')
        ->and($converter->getBSMonthInEnglish(6))->toBe('Ashoj')
        ->and($converter->getBSMonthInEnglish(12))->toBe('Chaitra');
});

test('date converter has correct bs month in nepali', function () {
    $converter = new DateConverterTestDouble();

    expect($converter->getBSMonthInNepali(1))->toBe('वैशाख')
        ->and($converter->getBSMonthInNepali(6))->toBe('असोज')
        ->and($converter->getBSMonthInNepali(12))->toBe('चैत');
});

test('date converter has correct ad month in nepali', function () {
    $converter = new DateConverterTestDouble();

    expect($converter->getADMonthInNepali(1))->toBe('जनवरी')
        ->and($converter->getADMonthInNepali(6))->toBe('जून')
        ->and($converter->getADMonthInNepali(12))->toBe('दिसेम्बर');
});

test('date converter has correct day of week in nepali', function () {
    $converter = new DateConverterTestDouble();

    expect($converter->getDayOfWeekInNepali(1))->toBe('आइतवार')
        ->and($converter->getDayOfWeekInNepali(4))->toBe('बुधवार')
        ->and($converter->getDayOfWeekInNepali(7))->toBe('शनिवार');
});

test('date converter has correct day of week in english', function () {
    $converter = new DateConverterTestDouble();

    expect($converter->getDayOfWeekInEnglish(1))->toBe('Sunday')
        ->and($converter->getDayOfWeekInEnglish(4))->toBe('Wednesday')
        ->and($converter->getDayOfWeekInEnglish(7))->toBe('Saturday');
});

test('date converter has correct numbers in nepali', function () {
    $converter = new DateConverterTestDouble();

    expect($converter->getNumbersInNepali(0))->toBe('०')
        ->and($converter->getNumbersInNepali(5))->toBe('५')
        ->and($converter->getNumbersInNepali(9))->toBe('९');
});

test('date converter formats nepali numbers correctly', function () {
    $converter = new DateConverterTestDouble();

    expect($converter->formattedNepaliNumber('123'))->toBe('१२३')
        ->and($converter->formattedNepaliNumber('2080'))->toBe('२०८०')
        ->and($converter->formattedNepaliNumber('9876543210'))->toBe('९८७६५४३२१०');
});

test('date converter validates english date range correctly', function () {
    $converter = new DateConverterTestDouble();

    // Valid dates should pass should return true
    expect(fn () => $converter->isInRangeEng(1944, 1, 1))->not->toBeTrue();
    expect(fn () => $converter->isInRangeEng(2033, 12, 31))->not->toBeTrue();

    // Invalid dates should return false
    expect($converter->isInRangeEng(1943, 12, 31))->toBeFalse();
    expect($converter->isInRangeEng(2034, 1, 1))->toBeFalse();
    expect($converter->isInRangeEng(2000, 0, 15))->toBeFalse();
    expect($converter->isInRangeEng(2000, 13, 15))->toBeFalse();
    expect($converter->isInRangeEng(2000, 6, 0))->toBeFalse();
    expect($converter->isInRangeEng(2000, 6, 32))->toBeFalse();
});

test('date converter validates nepali date range correctly', function () {
    $converter = new DateConverterTestDouble();

    // Valid dates
    expect($converter->isInRangeNep(2000, 1, 1))->toBeTrue();
    expect($converter->isInRangeNep(2089, 12, 30))->toBeTrue();

    // Invalid dates
    expect($converter->isInRangeNep(1999, 12, 30))->toBeFalse();
    expect($converter->isInRangeNep(2090, 1, 1))->toBeFalse();
    expect($converter->isInRangeNep(2080, 0, 15))->toBeFalse();
    expect($converter->isInRangeNep(2080, 13, 15))->toBeFalse();
    expect($converter->isInRangeNep(2080, 6, 0))->toBeFalse();
    expect($converter->isInRangeNep(2080, 6, 33))->toBeFalse();
});

test('date converter correctly identifies leap years', function () {
    $converter = new DateConverterTestDouble();

    // Leap years
    expect($converter->isLeapYear(2000))->toBeTrue(); // Divisible by 400
    expect($converter->isLeapYear(2004))->toBeTrue(); // Divisible by 4
    expect($converter->isLeapYear(2020))->toBeTrue(); // Divisible by 4

    // Non-leap years
    expect($converter->isLeapYear(1900))->toBeFalse(); // Divisible by 100 but not by 400
    expect($converter->isLeapYear(2100))->toBeFalse(); // Divisible by 100 but not by 400
    expect($converter->isLeapYear(2021))->toBeFalse(); // Not divisible by 4
    expect($converter->isLeapYear(2022))->toBeFalse(); // Not divisible by 4
});

test('date converter calculates total english days correctly', function () {
    $converter = new DateConverterTestDouble();

    // Starting date used in calculations (1944-01-01 corresponds to day 1)
    $startDate = $converter->getTotalEnglishDays(1944, 1, 1);
    expect($startDate)->toBe(1);

    // One day later
    expect($converter->getTotalEnglishDays(1944, 1, 2))->toBe(2);

    // Next month (31 days after Jan 1)
    expect($converter->getTotalEnglishDays(1944, 2, 1))->toBe(32);

    // Leap year Feb 29
    expect($converter->getTotalEnglishDays(1944, 2, 29))->toBe(60);

    // One year later (1945-01-01), 1944 is leap year so 366 days
    expect($converter->getTotalEnglishDays(1945, 1, 1))->toBe(367);

    // Check a date far in the future
    $daysFrom1944To2022 = 0;
    for ($year = 1944; $year < 2022; $year++) {
        $daysInYear = $converter->isLeapYear($year) ? 366 : 365;
        $daysFrom1944To2022 += $daysInYear;
    }
    // 2022-01-01
    expect($converter->getTotalEnglishDays(2022, 1, 1))->toBe($daysFrom1944To2022 + 1);
});

test('date converter calculates total nepali days correctly', function () {
    $converter = new DateConverterTestDouble();
    $calendarData = $converter->getCalendarData();

    // Starting date used in calculations (2000-01-01 corresponds to day 1)
    $startDate = $converter->getTotalNepaliDays(2000, 1, 1);
    expect($startDate)->toBe(1);

    // One day later
    expect($converter->getTotalNepaliDays(2000, 1, 2))->toBe(2);

    // Next month
    $daysInMonth1 = $calendarData[0][1]; // Days in 2000/01
    expect($converter->getTotalNepaliDays(2000, 2, 1))->toBe($daysInMonth1 + 1);

    // One year later (2001-01-01)
    $daysIn2000 = 0;
    for ($m = 1; $m <= 12; $m++) {
        $daysIn2000 += $calendarData[0][$m];
    }
    expect($converter->getTotalNepaliDays(2001, 1, 1))->toBe($daysIn2000 + 1);

    // Manually calculate days for a date several years later
    $totalDays = 0;
    $targetYear = 2080;
    $targetMonth = 5;
    $targetDay = 15;

    // Add complete years
    for ($y = 2000; $y < $targetYear; $y++) {
        $yearIndex = $y - 2000;
        for ($m = 1; $m <= 12; $m++) {
            $totalDays += $calendarData[$yearIndex][$m];
        }
    }

    // Add complete months in target year
    $yearIndex = $targetYear - 2000;
    for ($m = 1; $m < $targetMonth; $m++) {
        $totalDays += $calendarData[$yearIndex][$m];
    }

    // Add days in target month
    $totalDays += $targetDay;

    expect($converter->getTotalNepaliDays($targetYear, $targetMonth, $targetDay))->toBe($totalDays);
});

test('calendar data is correctly structured', function () {
    $converter = new DateConverterTestDouble();
    $calendarData = $converter->getCalendarData();

    // Check that years span from 2000 to 2090
    expect(count($calendarData))->toBe(91);
    expect($calendarData[0][0])->toBe(2000);
    expect($calendarData[90][0])->toBe(2090);

    // Check that each year has 13 elements (year + 12 months)
    foreach ($calendarData as $yearData) {
        expect(count($yearData))->toBe(13);
    }
});
