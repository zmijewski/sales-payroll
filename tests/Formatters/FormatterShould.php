<?php

namespace SalesPayrollTests;

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use SalesPayroll\Formatters\CSVFormatter;

class FormatterShould extends \PHPUnit_Framework_TestCase
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
        $this->assertInstanceOf('SalesPayroll\Formatters\Formatter', new CSVFormatter());
    }

    /**
     * @test
     */
    public function createNewEmptyFile()
    {
        (new CSVFormatter())->create(vfsStream::url('root') . '/csv-file', []);

        $this->assertTrue($this->vfsStream->hasChild('csv-file.csv'));
    }

    /**
     * @test
     */
    public function createCSVFileWithTwoColumnsAndRows()
    {
        $data = [
            ['1.0', '1.1'],
            ['2.0', '2.1'],
        ];

        (new CSVFormatter())->create(vfsStream::url('root') . '/csv-file', $data);

        $this->assertEquals("1.0,1.1\n2.0,2.1\n", $this->vfsStream->getChild('csv-file.csv')->getContent());
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