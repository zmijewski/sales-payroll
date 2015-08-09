<?php

namespace SalesPayrollTests;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use SalesPayroll\Formatters\CSVFormatter;
use SalesPayroll\Command;
use SalesPayroll\PaymentDateCalculator;
use SalesPayroll\Utility\InputReader;

class OrderShould extends \PHPUnit_Framework_TestCase
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
    public function executeCommand()
    {
        (new Command(
            new CSVFormatter,
            new PaymentDateCalculator(new \DateTime),
            new InputReader(['f' => vfsStream::url('root') . '/example'])))
            ->execute();
    }
}
