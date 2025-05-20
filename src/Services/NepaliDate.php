<?php

namespace Pratiksh\Nepalidate\Services;

use Carbon\Carbon;
use Pratiksh\Nepalidate\Services\DateConverter;

final class NepaliDate extends DateConverter
{
    public $eng_year;
    public $eng_month;
    public $eng_day;

    public function __construct($eng_year, $eng_month, $eng_day)
    {
        $this->eng_year = $eng_year;
        $this->eng_month = $eng_month;
        $this->eng_day = $eng_day;

        // Conversion
        $this->convertToBS();
    }

    public static function create(Carbon $date): NepaliDate
    {
        return new static($date->year, $date->month, $date->day);
    }

    public static function fromAD(Carbon $date): NepaliDate
    {
        return new static($date->year, $date->month, $date->day);
    }

    public function convertToBS()
    {
        // Throw exception if out of range
        $this->is_in_range_eng($this->eng_year, $this->eng_month, $this->eng_day);
        $this->conversion();
    }

    public function toCarbon()
    {
        return Carbon::create($this->year, $this->month, $this->day);
    }

    protected function conversion()
    {
        $total_ad_days = $this->calculateTotalEnglishDays($this->eng_year, $this->eng_month, $this->eng_day);
        $initial_nepali_year = 2000;
        $initial_nepali_month = 9;
        $initial_nepali_day = 16;
        $dayOfWeek = $this->dayOfWeek;

        $nepali_year = $initial_nepali_year;
        $nepali_month = $initial_nepali_month;
        $nepali_day = $initial_nepali_day;

        $i = 0;
        $j = $initial_nepali_month;

        while ($total_ad_days != 0) {
            $lastDayOfMonth = $this->calendarData[$i][$j];

            $nepali_day++;
            $dayOfWeek++;

            if ($nepali_day > $lastDayOfMonth) {
                $nepali_month++;
                $nepali_day = 1;
                $j++;
            }

            if ($dayOfWeek > 7) {
                $dayOfWeek = 1;
            }

            if ($nepali_month > 12) {
                $nepali_year++;
                $nepali_month = 1;
            }

            if ($j > 12) {
                $j = 1;
                $i++;
            }

            $this->year = $nepali_year;
            $this->month = $nepali_month;
            $this->day = $nepali_day;
            $this->dayOfWeek = $dayOfWeek;

            $total_ad_days--;
        }
    }
    // Conversions Outputs
    public function toBS(): string
    {
        return $this->year . '-' . sprintf('%02d', $this->month) . '-' . sprintf('%02d', $this->day);
    }

    public function toBSArray(): array
    {
        return [
            'year' => $this->year,
            'month' => sprintf('%02d', $this->month),
            'day' => sprintf('%02d', $this->day),
            'dayOfWeek' => $this->dayOfWeek
        ];
    }

    public function toFormattedEnglishBSDate()
    {
        return $this->day . ' ' .
            $this->getBSMonthInEnglish($this->month) . ' ' .
            $this->year . ',' .
            ' ' .
            $this->getDayOfWeekInEnglish($this->dayOfWeek);
    }

    public function toFormattedNepaliBSDate()
    {
        return $this->getNumbersInNepali($this->day) . ' ' .
            $this->getBSMonthInNepali($this->month) . ' ' .
            $this->formattedNepaliNumber($this->year) . ',' .
            ' ' .
            $this->getDayOfWeekInNepali($this->dayOfWeek);
    }
}
