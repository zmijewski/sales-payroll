<?php

namespace SalesPayroll\Formatters;

interface Formatter
{
    public function create($fileName, $data);
}