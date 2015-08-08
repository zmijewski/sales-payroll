<?php

namespace SalesPayrollTests;

use SalesPayroll\Order;
use SalesPayroll\Utility\InputReader;

class OrderShould extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function beCreated()
    {
        $this->assertTrue(is_object(new Order(new InputReader)));
    }
}
