<?php

namespace SalesPayrollTests\Utility;

use SalesPayroll\Utility\ArgumentReader;

class ArgumentReaderShould extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function implementReaderInterface()
    {
        $this->assertInstanceOf('SalesPayroll\Utility\ReaderInterface', new ArgumentReader());
    }

    /**
     * @test
     */
    public function readFileName()
    {
      $inputReader = new ArgumentReader(['f' => 'payroll2015']);

      $this->assertEquals('payroll2015', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function setDefaultFileNameWhenFileNameNotPassed()
    {
        $inputReader = new ArgumentReader();

        $this->assertEquals('payroll', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function setDefaultFileNameWhenFlagPassedButWithFalseValue()
    {
        $inputReader = new ArgumentReader(['f' => false]);

        $this->assertEquals('payroll', $inputReader->getFileName());
    }

    /**
     * @test
     */
    public function notLetPassCharsDifferentThanAlphaNumeric()
    {
        $this->setExpectedException('\Exception', 'Filename can contain only letters or digits');

        new ArgumentReader(['f' => './directory/example']);
    }
}
