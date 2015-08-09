<?php

namespace SalesPayroll;

use SalesPayroll\Formatters\FormatterInterface;
use SalesPayroll\Utility\ReaderInterface;

class Command
{
    /** @var FormatterInterface */
    private $formatter;
    /** @var PaymentDateCalculator */
    private $calculator;
    /** @var ReaderInterface */
    private $reader;
    /** @var bool */
    private $isCompletedSuccessfuly;

    /**
     * @param FormatterInterface    $formatter
     * @param PaymentDateCalculator $calculator
     * @param ReaderInterface       $reader
     */
    public function __construct(FormatterInterface $formatter, PaymentDateCalculator $calculator, ReaderInterface $reader)
    {
        $this->reader = $reader;
        $this->formatter = $formatter;
        $this->calculator = $calculator;
    }

    public function execute()
    {
        $this->isCompletedSuccessfuly = $this->formatter->create(
            $this->reader->getFileName(),
            $this->calculator->getPaymentDates()
        );

        return $this;
    }

    public function printMessage()
    {
        if ($this->isCompletedSuccessfuly) {
            printf("File %s created successfuly.\n", $this->reader->getFileName());
            return 0;
        } else {
            printf("File could not be created.\n");
            return 1;
        }
    }
}
