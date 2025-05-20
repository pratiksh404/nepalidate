<?php

namespace Pratiksh\Nepalidate\Services;

use Carbon\Carbon;

abstract class DateConverter
{
    public $year;
    public $month;
    public $day;

    protected $calendarData = array(
        0 => array(2000, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        1 => array(2001, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        2 => array(2002, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        3 => array(2003, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        4 => array(2004, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        5 => array(2005, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        6 => array(2006, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        7 => array(2007, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        8 => array(2008, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        9 => array(2009, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        10 => array(2010, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        11 => array(2011, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        12 => array(2012, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        13 => array(2013, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        14 => array(2014, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        15 => array(2015, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        16 => array(2016, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        17 => array(2017, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        18 => array(2018, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        19 => array(2019, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        20 => array(2020, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        21 => array(2021, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        22 => array(2022, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        23 => array(2023, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        24 => array(2024, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        25 => array(2025, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        26 => array(2026, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        27 => array(2027, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        28 => array(2028, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        29 => array(2029, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        30 => array(2030, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        31 => array(2031, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        32 => array(2032, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        33 => array(2033, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        34 => array(2034, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        35 => array(2035, 30, 32, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        36 => array(2036, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        37 => array(2037, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        38 => array(2038, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        39 => array(2039, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        40 => array(2040, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        41 => array(2041, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        42 => array(2042, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        43 => array(2043, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        44 => array(2044, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        45 => array(2045, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        46 => array(2046, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        47 => array(2047, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        48 => array(2048, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        49 => array(2049, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        50 => array(2050, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        51 => array(2051, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        52 => array(2052, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        53 => array(2053, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        54 => array(2054, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        55 => array(2055, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        56 => array(2056, 31, 31, 32, 31, 32, 30, 30, 29, 30, 29, 30, 30),
        57 => array(2057, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        58 => array(2058, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        59 => array(2059, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        60 => array(2060, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        61 => array(2061, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        62 => array(2062, 30, 32, 31, 32, 31, 31, 29, 30, 29, 30, 29, 31),
        63 => array(2063, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        64 => array(2064, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        65 => array(2065, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        66 => array(2066, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 29, 31),
        67 => array(2067, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        68 => array(2068, 31, 31, 32, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        69 => array(2069, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        70 => array(2070, 31, 31, 31, 32, 31, 31, 29, 30, 30, 29, 30, 30),
        71 => array(2071, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        72 => array(2072, 31, 32, 31, 32, 31, 30, 30, 29, 30, 29, 30, 30),
        73 => array(2073, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 31),
        74 => array(2074, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        75 => array(2075, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        76 => array(2076, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        77 => array(2077, 31, 32, 31, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        78 => array(2078, 31, 31, 31, 32, 31, 31, 30, 29, 30, 29, 30, 30),
        79 => array(2079, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        80 => array(2080, 31, 32, 31, 32, 31, 30, 30, 30, 29, 29, 30, 30),
        81 => array(2081, 31, 31, 32, 32, 31, 30, 30, 30, 29, 30, 29, 31),
        82 => array(2082, 31, 31, 32, 31, 31, 31, 30, 29, 30, 29, 30, 30),
        83 => array(2083, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        84 => array(2084, 31, 31, 32, 31, 31, 30, 30, 30, 29, 30, 30, 30),
        85 => array(2085, 31, 32, 31, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        86 => array(2086, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        87 => array(2087, 31, 31, 32, 31, 31, 31, 30, 30, 29, 30, 30, 30),
        88 => array(2088, 30, 31, 32, 32, 30, 31, 30, 30, 29, 30, 30, 30),
        89 => array(2089, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30),
        90 => array(2090, 30, 32, 31, 32, 31, 30, 30, 30, 29, 30, 30, 30)
    );

    private $bsMonthInEnglish = [
        1 => 'Baisakh',
        2 => 'Jestha',
        3 => 'Ashar',
        4 => 'Shrawan',
        5 => 'Bhadra',
        6 => 'Ashoj',
        7 => 'Kartik',
        8 => 'Mangsir',
        9 => 'Poush',
        10 => 'Magh',
        11 => 'Falgun',
        12 => 'Chaitra',
    ];

    private $dayOfWeekInEnglish = [
        1 => 'Sunday',
        2 => 'Monday',
        3 => 'Tuesday',
        4 => 'Wednesday',
        5 => 'Thursday',
        6 => 'Friday',
        7 => 'Saturday',
    ];

    private $bsMonthInNepali = [
        1 => 'वैशाख',
        2 => 'जेठ',
        3 => 'असार',
        4 => 'साउन',
        5 => 'भदौ',
        6 => 'असोज',
        7 => 'कार्तिक',
        8 => 'मंसिर',
        9 => 'पुष',
        10 => 'माघ',
        11 => 'फागुन',
        12 => 'चैत',
    ];

    private $adMonthInNepali = [
        1 => 'जनवरी',
        2 => 'फेब्रुवरी',
        3 => 'मार्च',
        4 => 'अप्रिल',
        5 => 'मई',
        6 => 'जून',
        7 => 'जुलाई',
        8 => 'अगष्ट',
        9 => 'सेप्टेम्बर',
        10 => 'अक्टोबर',
        11 => 'नवेम्बर',
        12 => 'दिसेम्बर',
    ];

    private $dayOfWeekInNepali = [
        1 => 'आइतवार',
        2 => 'सोमवार',
        3 => 'मङ्गलवार',
        4 => 'बुधवार',
        5 => 'बिहिवार',
        6 => 'शुक्रवार',
        7 => 'शनिवार',
    ];

    private $numbersInNepali = [
        0 => '०',
        1 => '१',
        2 => '२',
        3 => '३',
        4 => '४',
        5 => '५',
        6 => '६',
        7 => '७',
        8 => '८',
        9 => '९',
    ];

    protected $normalMonths = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    protected $leapMonths = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];


    protected $dayOfWeek = 6; // 7 - 1, 0 for sunday, 6 for saturday


    public function getBSMonthInEnglish($month): string
    {
        return $this->bsMonthInEnglish[$month];
    }

    public function getBSMonthInNepali($month): string
    {
        return $this->bsMonthInNepali[$month];
    }

    public function getADMonthInNepali($month): string
    {
        return $this->adMonthInNepali[$month];
    }

    public function getDayOfWeekInNepali($day): string
    {
        return $this->dayOfWeekInNepali[$day];
    }

    public function getDayOfWeekInEnglish($day): string
    {
        return $this->dayOfWeekInEnglish[$day];
    }

    public function getNumbersInNepali($day): string
    {
        return $this->numbersInNepali[$day];
    }

    public function formattedNepaliNumber($value)
    {
        $numbers = str_split($value);

        foreach ($numbers as $key => $number) {
            $numbers[$key] = $this->numbersInNepali[$number];
        }

        return implode('', $numbers);
    }

    /**
     * Check if date range is in english
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     */
    protected function is_in_range_eng($yy, $mm, $dd)
    {
        if ($yy < 1944 || $yy > 2033) {
            throw new \Exception('Supported only between 1944-2022');
        }

        if ($mm < 1 || $mm > 12) {
            throw new \Exception('Error! month value can be between 1-12 only');
        }

        if ($dd < 1 || $dd > 31) {
            throw new \Exception('Error! day value can be between 1-31 only');
        }
    }

    /**
     * Check if date is with in nepali data range
     *
     * @param int $yy
     * @param int $mm
     * @param int $dd
     */
    protected function is_in_range_nep($yy, $mm, $dd)
    {
        if ($yy < 2000 || $yy > 2089) {
            return 'Supported only between 2000-2089';
        }

        if ($mm < 1 || $mm > 12) {
            return 'Error! month value can be between 1-12 only';
        }

        if ($dd < 1 || $dd > 32) {
            return 'Error! day value can be between 1-31 only';
        }
    }

    /**
     * Calculates wheather english year is leap year or not
     *
     * @param int $year
     * @return bool
     */
    protected function is_leap_year($year)
    {
        $a = $year;
        if ($a % 100 == 0) {
            if ($a % 400 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            if ($a % 4 == 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    protected function calculateTotalEnglishDays($year, $month, $day): int
    {
        $total_ad_days = 0;
        $initial_english_year = 1944;

        for ($i = 0; $i < ($year - $initial_english_year); $i++) {
            if ($this->is_leap_year($initial_english_year + $i)) {
                for ($j = 0; $j < 12; $j++) {
                    $total_ad_days += $this->leapMonths[$j];
                }
            } else {
                for ($j = 0; $j < 12; $j++) {
                    $total_ad_days += $this->normalMonths[$j];
                }
            }
        }

        for ($i = 0; $i < ($month - 1); $i++) {
            if ($this->is_leap_year($year)) {
                $total_ad_days += $this->leapMonths[$i];
            } else {
                $total_ad_days += $this->normalMonths[$i];
            }
        }

        $total_ad_days += $day;

        return $total_ad_days;
    }

    /**
     * Calculate total days from a reference Nepali date to the specified Nepali date
     * 
     * @param int $year Nepali year
     * @param int $month Nepali month (1-12)
     * @param int $day Nepali day
     * @return int Total number of days
     */
    protected function calculateTotalNepaliDays($year, $month, $day): int
    {
        $total_bs_days = 0;
        $initial_nepali_year = 2000;

        // Add days for complete years
        for ($i = $initial_nepali_year; $i < $year; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                $yearIndex = $i - $initial_nepali_year;
                $total_bs_days += $this->calendarData[$yearIndex][$j];
            }
        }

        // Add days for complete months in the target year
        $yearIndex = $year - $initial_nepali_year;
        for ($j = 1; $j < $month; $j++) {
            $total_bs_days += $this->calendarData[$yearIndex][$j];
        }

        // Add remaining days in the final month
        $total_bs_days += $day;

        return $total_bs_days;
    }
}
