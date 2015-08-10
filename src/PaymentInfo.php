<?php

namespace SalesPayroll;

class PaymentInfo implements PaymentInfoInterface
{
    /** @var  string */
    private $salaryDate;
    /** @var  string */
    private $bonusDate;
    /** @var  integer */
    private $year;
    /** @var  integer */
    private $month;
    /** @var  string */
    private $monthName;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
        $this->setPaymentDay();
        $this->setBonusDay();
        $this->setMonthName();
    }

    public function getAsArray()
    {
        return [$this->monthName, $this->salaryDate, $this->bonusDate];
    }

    private function setPaymentDay()
    {
        $lastWorkingDay = (new \DateTime())->setDate($this->year, $this->month, date('t', mktime(0, 0, 0, $this->month, 1, $this->year)));
        $lastDay = $lastWorkingDay->format('l');

        if($lastDay == "Saturday") {
            $lastWorkingDay->modify('-1 day');
        } elseif($lastDay == "Sunday") {
            $lastWorkingDay->modify('-2 day');
        }

        $this->salaryDate = $lastWorkingDay->format('Y-m-d');
    }

    private function setBonusDay()
    {
        $date = (new \DateTime())->setDate($this->year, $this->month, 15);

        if ($this->isWeekend($date->format('l'))) {
            $date->modify('next wednesday');
        }

        $this->bonusDate = $date->format('Y-m-d');
    }

    private function setMonthName()
    {
        $this->monthName = (new \DateTime())->setDate($this->year, $this->month, 15)->format('F');
    }

    private function isWeekend($day)
    {
        return ($day == "Saturday" || $day == "Sunday");
    }


}