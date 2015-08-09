<?php

namespace SalesPayroll;

use SalesPayroll\Formatters\Formatter;
use SalesPayroll\Utility\Reader;

class Command
{
    /** @var Formatter */
    private $formatter;
    /** @var PaymentDateCalculator */
    private $calculator;
    /** @var Reader */
    private $reader;
    /** @var bool */
    private $isCompletedSuccessfuly;

    /**
     * @param Formatter             $formatter
     * @param PaymentDateCalculator $calculator
     * @param Reader                $reader
     */
    public function __construct(Formatter $formatter, PaymentDateCalculator $calculator, Reader $reader)
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
            return 0;
        } else {
            printf("File could not be created.");
            return 1;
        }
    }
}
