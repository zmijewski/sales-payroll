<?php

namespace SalesPayrollTests;

use SalesPayroll\PaymentDateCalculator;

class PaymentDateCalculatorShould extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnEmptyPaymentDates()
    {
        $calculator = new PaymentDateCalculator(new \DateTime);
        $this->assertEmpty($calculator->getPaymentDates());
    }
}