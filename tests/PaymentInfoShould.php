<?php

namespace SalesPayrollTests;

use SalesPayroll\PaymentInfo;

class PaymentInfoShould extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnArrayWithMonthAndSalaryDateAndBonusDate()
    {
        $this->assertEquals(['August', '2015-08-31', '2015-08-19'], (new PaymentInfo(2015, 8))->getAsArray());
    }

    /**
     * @test
     */
    public function returnCorrectArrayDataForFebruary()
    {
        $this->assertEquals(['February', '2015-02-27', '2015-02-18'], (new PaymentInfo(2015, 2))->getAsArray());
    }

    /**
     * @test
     */
    public function returnCorrectArrayDataForDecember()
    {
        $this->assertEquals(['December', '2015-12-31', '2015-12-15'], (new PaymentInfo(2015, 12))->getAsArray());
    }

    /**
     * @test
     */
    public function returnCorrectArrayDataForJanuary()
    {
        $this->assertEquals(['January', '2015-01-30', '2015-01-15'], (new PaymentInfo(2015, 1))->getAsArray());
    }
}