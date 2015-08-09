<?php

namespace SalesPayroll;

use SalesPayroll\Formatters\Formatter;
use SalesPayroll\Utility\InputReader;

class Command
{
    /** @var Formatter */
    private $formatter;
    /** @var PaymentDateCalculator */
    private $calculator;
    /** @var InputReader */
    private $reader;
    /** @var bool */
    private $isCompletedSuccessfuly;

    /**
     * @param Formatter             $formatter
     * @param PaymentDateCalculator $calculator
     * @param InputReader           $reader
     */
    public function __construct(Formatter $formatter, PaymentDateCalculator $calculator, InputReader $reader)
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
            printf("File %s created successfuly.", $this->reader->getFileName());
        } else {
            printf("File could not be created.");
        }
    }
}
