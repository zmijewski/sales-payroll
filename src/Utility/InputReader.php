<?php

namespace SalesPayroll\Utility;

class InputReader implements ReaderInterface
{
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
    } elseif (!ctype_alnum($this->input['f'])) {
      throw new \Exception('Filename can contain only letters or digits');
    } else {
      $this->fileName = $this->input['f'];
    }
  }
}
