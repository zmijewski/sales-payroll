<?php

namespace SalesPayroll\Utility;

interface ReaderInterface
{
    const DEFAULT_FILE_NAME = 'payroll';

    public function getFileName();
}