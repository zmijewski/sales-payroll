<?php

namespace SalesPayroll;

class PaymentDateCalculator
{
    private $date;

    public function __construct($date)
    {
        $this->date = $date;
    }

    public function getPaymentDates()
    {
        return [];
    }
}