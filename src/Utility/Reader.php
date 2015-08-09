<?php

namespace SalesPayroll\Utility;

interface Reader
{
    const DEFAULT_FILE_NAME = 'payroll';

    public function getFileName();
}