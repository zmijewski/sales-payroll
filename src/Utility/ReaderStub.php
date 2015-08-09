<?php

namespace SalesPayroll\Utility;

class ReaderStub implements ReaderInterface
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