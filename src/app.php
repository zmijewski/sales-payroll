<?php

namespace SalesPayroll;

use SalesPayroll\Utility\InputReader;

require __DIR__ . '/../vendor/autoload.php';

$app = new Order((new InputReader(getopt('f:'))));
