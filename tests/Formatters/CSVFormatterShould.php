<?php

namespace SalesPayrollTests;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use SalesPayroll\Formatters\CSVFormatter;
use SalesPayroll\PaymentInfoStub;

class CSVFormatterShould extends \PHPUnit_Framework_TestCase
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
    public function implementFormatterInterface()
    {
        $this->assertInstanceOf('SalesPayroll\Formatters\FormatterInterface', new CSVFormatter());
    }

    /**
     * @test
     */
    public function createCSVFileWithThreeColumnsAndThreeRows()
    {
        $firstRow = new PaymentInfoStub('', '');
        $firstRow->setColumns('August', '2015-08-31', '2015-08-19');
        $secondRow = new PaymentInfoStub('', '');
        $secondRow->setColumns('September', '2015-09-30', '2015-09-15');

        (new CSVFormatter())->create(vfsStream::url('root') . '/csv-file', [
            $firstRow,
            $secondRow
        ]);

        $expectedString = "\"Month name\",\"Salary Payment Date\",\"Bonus Payment Date\"\nAugust,2015-08-31,2015-08-19\nSeptember,2015-09-30,2015-09-15\n";
        $this->assertEquals($expectedString, $this->vfsStream->getChild('csv-file.csv')->getContent());
    }

    /**
     * @test
     */
    public function replaceOldFileWithTheSameName()
    {
        $formatter = new CSVFormatter();
        $formatter->create(vfsStream::url('root') . '/csv-file', []);
        $formatter->create(vfsStream::url('root') . '/csv-file', []);

        $this->assertTrue($this->vfsStream->hasChild('csv-file.csv'));
    }

    /**
     * @test
     */
    public function handleErrorException()
    {
        $this->assertFalse((new CSVFormatter())->create(vfsStream::url('root') . '/not-existing-dir/payroll', []));
    }
}