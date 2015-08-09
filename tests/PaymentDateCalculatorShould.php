<?php

namespace SalesPayrollTests;

use SalesPayroll\PaymentDateCalculator;

class PaymentDateCalculatorShould extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnFivePaymentDatesWhenAugustPassed()
    {
        $calculator = new PaymentDateCalculator(new \DateTime('2015-08-15'));
        $this->assertCount(5, $calculator->getPaymentDates());
    }
}