<?php

namespace SalesPayroll;

use SalesPayroll\Formatters\CSVFormatter;
use SalesPayroll\Utility\ArgumentReader;

require __DIR__ . '/../vendor/autoload.php';

date_default_timezone_set('UTC');

$status = (new Command(
    (new CSVFormatter),
    (new PaymentDateCalculator(new \DateTime)),
    (new ArgumentReader(getopt('f:')))))
    ->execute()
    ->printMessage();

exit($status);