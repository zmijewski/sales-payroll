<?php

namespace PaymentCalendarTests;

use PaymentCalendar\Order;

class OrderShould extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function beCreated()
    {
        $this->assertTrue(is_object(new Order));
    }
}
