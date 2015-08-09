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
      $inputReader = new InputReader(['f' => 'payroll2015']);

      $this->assertEquals('payroll2015', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function setDefaultFileNameWhenFileNameNotPassed()
    {
        $inputReader = new InputReader();

        $this->assertEquals('payroll', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function setDefaultFileNameWhenFlagPassedButWithFalseValue()
    {
        $inputReader = new InputReader(['f' => false]);

        $this->assertEquals('payroll', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function notLetPassCharsDifferentThanAlphaNumeric()
    {
        $this->setExpectedException('\Exception', 'Filename can contain only letters or digits');

        new InputReader(['f' => './directory/example']);
    }
}
