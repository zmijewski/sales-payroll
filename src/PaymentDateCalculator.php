<?php

namespace SalesPayroll;

class PaymentDateCalculator
{
    private $date;

    public function __construct(\DateTime $date)
    {
        $this->date = $date;
    }

    public function getPaymentDates()
    {
        $month = $this->date->format('m');
        $year = $this->date->format('Y');
        $paymentDays = [];
        for ($i = $month; $i <= 12; $i++) {
            array_push($paymentDays, new PaymentInfo($year, $i));
        }

        return $paymentDays;
    }
}