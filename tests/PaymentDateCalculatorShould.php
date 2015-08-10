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

    /**
     * @test
     */
    public function returnOnePaymentDatesWhenDecemberPassed()
    {
        $calculator = new PaymentDateCalculator(new \DateTime('2015-12-15'));
        $this->assertCount(1, $calculator->getPaymentDates());
    }

    /**
     * @test
     */
    public function returnTwelvePaymentDatesWhenJanuaryPassed()
    {
        $calculator = new PaymentDateCalculator(new \DateTime('2015-01-15'));
        $this->assertCount(12, $calculator->getPaymentDates());
    }
}