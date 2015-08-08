<?php

namespace SalesPayrollTests\Utility;

use SalesPayroll\Utility\InputReader;

class InputReaderShould extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function readFileName()
    {
      $inputReader = new InputReader(['f' => 'payroll_2015']);

      $this->assertEquals('payroll_2015', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function setDefaultFileNameWhenFileNameNotPassed()
    {
        $inputReader = new InputReader();

        $this->assertEquals('sales_payroll', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function setDefaultFileNameWhenFlagPassedButWithFalseValue()
    {
        $inputReader = new InputReader(['f' => false]);

        $this->assertEquals('sales_payroll', $inputReader->getFileName());
    }
}
