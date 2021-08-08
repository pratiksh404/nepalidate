<?php

namespace Pratiksh\Nepalidate\Tests\Feature;

use Carbon\Carbon;
use Orchestra\Testbench\TestCase;
use Pratiksh\Nepalidate\Services\NepaliDate as PratikshNepaliDate;

class nepaliDateCheckTest extends TestCase
{
    /** @test */
    public function check_toBS()
    {
        $nepalidate = new PratikshNepaliDate();
        $date = Carbon::create('2021-08-05');
        $toBSDate = $nepalidate->create($date)->toBS();
        $this->assertEquals('2078-4-21', $toBSDate);
    }

    /** @test */
    public function check_toFormattedBSDate()
    {
        $nepalidate = new PratikshNepaliDate();
        $date = Carbon::create('2021-08-05');
        $toBSDate = $nepalidate->create($date)->toFormattedBSDate();
        $this->assertEquals('21 Shrawan 2078, Thurday', $toBSDate);
    }

    /** @test */
    public function check_toFormattedNepaliDate()
    {
        $nepalidate = new PratikshNepaliDate();
        $date = Carbon::create('2021-08-05');
        $toBSDate = $nepalidate->create($date)->toFormattedNepaliDate();
        $this->assertEquals('२१ साउन २०७८, बिहिवार', $toBSDate);
    }
}
