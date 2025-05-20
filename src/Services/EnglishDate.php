<?php

namespace Pratiksh\Nepalidate\Services;

use Carbon\Carbon;

final class EnglishDate extends DateConverter
{
    public $nep_year;
    public $nep_month;
    public $nep_day;

    public Carbon $date;

    public function __construct($nep_year, $nep_month, $nep_day)
    {
        $this->nep_year = $nep_year;
        $this->nep_month = $nep_month;
        $this->nep_day = $nep_day;

        // Conversion
        $this->convertToAD();
    }

    public static function create(string $date): EnglishDate
    {
        $date = str_replace('/', '-', $date);
        $date = explode('-', $date);
        if (count($date) != 3) {
            throw new \Exception('Invalid date format');
        }

        return new static($date[0], $date[1], $date[2]);
    }

    public static function fromBS(string $date): EnglishDate
    {
        $date = str_replace('/', '-', $date);
        $date = explode('-', $date);
        if (count($date) != 3) {
            throw new \Exception('Invalid date format');
        }

        return new static($date[0], $date[1], $date[2]);
    }

    public function convertToAD()
    {
        // Throw exception if out of range
        $this->is_in_range_nep($this->nep_year, $this->nep_month, $this->nep_day);
        $this->conversion();
    }

    public function toCarbon()
    {
        return Carbon::create($this->year, $this->month, $this->day);
    }

    /**
     * Convert Nepali (BS) date to English (AD) date.
     */
    protected function conversion()
    {
        // Calculate total days from reference Nepali date
        $total_bs_days = $this->calculateTotalNepaliDays($this->nep_year, $this->nep_month, $this->nep_day);

        // Initialize with reference English date (corresponding to Nepali 2000-01-01)
        // CORRECTED: Adjusted the reference date to fix the one-day offset
        $initial_english_year = 1943;
        $initial_english_month = 4;
        $initial_english_day = 13;  // Changed from 14 to 13
        $dayOfWeek = $this->dayOfWeek;

        // Set initial values
        $english_year = $initial_english_year;
        $english_month = $initial_english_month;
        $english_day = $initial_english_day;

        // Process each day
        while ($total_bs_days != 0) {
            // Increment the English date by one day
            $english_day++;
            $dayOfWeek++;

            // Handle day of week wraparound
            if ($dayOfWeek > 7) {
                $dayOfWeek = 1;
            }

            // Handle month transition
            $days_in_month = $this->is_leap_year($english_year) ?
                $this->leapMonths[$english_month - 1] :
                $this->normalMonths[$english_month - 1];

            if ($english_day > $days_in_month) {
                $english_month++;
                $english_day = 1;
            }

            // Handle year transition
            if ($english_month > 12) {
                $english_year++;
                $english_month = 1;
            }

            // Update object properties
            $this->year = $english_year;
            $this->month = $english_month;
            $this->day = $english_day;
            $this->dayOfWeek = $dayOfWeek;

            $total_bs_days--;
        }
        $date = Carbon::create($this->year, $this->month, $this->day);
        if ($date != false) {
            $this->date = $date;
        } else {
            throw new \Exception('Invalid date');
        }
    }

    public function toAD($format = 'Y-m-d'): string
    {
        return $this->date->format($format);
    }
}
