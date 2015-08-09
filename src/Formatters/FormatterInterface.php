<?php

namespace SalesPayroll\Formatters;

interface FormatterInterface
{
    public function create($fileName, $data);
}