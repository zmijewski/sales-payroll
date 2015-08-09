<?php

namespace SalesPayroll;

interface PaymentInfoInterface
{
    public function __construct($year, $month);

    public function getAsArray();
}