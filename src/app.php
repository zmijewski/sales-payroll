<?php

namespace SalesPayroll;

use SalesPayroll\Formatters\CSVFormatter;
use SalesPayroll\Utility\InputReader;

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('UTC');

(new Command(
    (new CSVFormatter),
    (new PaymentDateCalculator(new \DateTime)),
    (new InputReader(getopt('f:')))))
    ->execute()
    ->printMessage();
