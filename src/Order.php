<?php

namespace SalesPayroll;

use SalesPayroll\Utility\InputReader;

class Order
{
    private $inputReader;

    public function __construct(InputReader $inputReader)
    {
        $this->inputReader = $inputReader;
    }
}
