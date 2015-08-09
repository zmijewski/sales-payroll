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
}