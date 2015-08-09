<?php

namespace SalesPayroll;

class PaymentInfoStub implements PaymentInfoInterface
{
    private $monthName;
    private $salaryDate;
    private $bonusDate;

    public function __construct($year, $month) {}

    public function setColumns($monthName, $salaryDate, $bonusDate)
    {
        $this->monthName = $monthName;
        $this->salaryDate = $salaryDate;
        $this->bonusDate = $bonusDate;
    }

    public function getAsArray()
    {
        return [$this->monthName, $this->salaryDate, $this->bonusDate];
    }
}