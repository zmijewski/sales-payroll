<?php

namespace SalesPayroll\Utility;

class InputReader
{
  const DEFAULT_FILE_NAME = 'sales_payroll';

  private $input;
  private $fileName;

  public function __construct(array $input = [])
  {
    $this->input = $input;
    $this->setFileName();
  }

  public function getFileName()
  {
    return $this->fileName;
  }

  private function setFileName()
  {
    if (!(isset($this->input['f']) && $this->input['f'])) {
      $this->fileName = self::DEFAULT_FILE_NAME;
    } else {
      $this->fileName = $this->input['f'];
    }
  }
}
