<?php

namespace SalesPayrollTests;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use SalesPayroll\Formatters\CSVFormatter;
use SalesPayroll\Command;
use SalesPayroll\PaymentDateCalculator;
use SalesPayroll\Utility\ReaderStub;

class CommandShould extends \PHPUnit_Framework_TestCase
{
    /** @var vfsStreamDirectory */
    private $vfsStream;

    public function setUp()
    {
        $this->vfsStream = vfsStream::setup('root');
    }

    /**
     * @test
     */
    public function printSuccessMessageWhenCommandIsSuccessfullyCompleted()
    {
        $isCompletedSuccessfully = (new Command(
            new CSVFormatter,
            new PaymentDateCalculator(new \DateTime),
            new ReaderStub(['f' => vfsStream::url('root') . '/example'])))
            ->execute()
            ->printMessage();

        $this->assertSuccessStatusCodeForBash($isCompletedSuccessfully);
    }

    /**
     * @test
     */
    public function printFailureMessageWhenCommandFails()
    {
        $isCompletedSuccessfully = (new Command(
            new CSVFormatter,
            new PaymentDateCalculator(new \DateTime),
            new ReaderStub(['f' => vfsStream::url('root') . '/dir/example'])))
            ->execute()
            ->printMessage();

        $this->assertFailureStatusCodeForBash($isCompletedSuccessfully);
    }

    private function assertSuccessStatusCodeForBash($isCompletedSuccessfully)
    {
        $this->assertEquals(0, $isCompletedSuccessfully);
    }

    private function assertFailureStatusCodeForBash($isCompletedSuccessfully)
    {
        $this->assertEquals(1, $isCompletedSuccessfully);
    }
}
