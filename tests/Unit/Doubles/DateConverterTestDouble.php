<?php

namespace Pratiksh\Nepalidate\Tests\Unit\Doubles;

use Pratiksh\Nepalidate\Services\DateConverter;

class DateConverterTestDouble extends DateConverter
{
    // Expose protected methods for testing
    public function isInRangeEng($yy, $mm, $dd): bool
    {
        try {
            $this->is_in_range_eng($yy, $mm, $dd);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function isInRangeNep($yy, $mm, $dd): bool
    {
        try {
            $this->is_in_range_nep($yy, $mm, $dd);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function isLeapYear($year)
    {
        return $this->is_leap_year($year);
    }

    public function getTotalEnglishDays($year, $month, $day)
    {
        return $this->calculateTotalEnglishDays($year, $month, $day);
    }

    public function getTotalNepaliDays($year, $month, $day)
    {
        return $this->calculateTotalNepaliDays($year, $month, $day);
    }

    public function getCalendarData()
    {
        return $this->calendarData;
    }
}
