<?php

namespace SalesPayroll\Utility;

class ReaderStub implements Reader
{
    private $input;

    public function __construct(array $input = [])
    {
        $this->input = $input;
    }

    public function getFileName()
    {
        return $this->input['f'];
    }
}