<?php

declare(strict_types=1);

namespace App;

class Request
{
  private array $request;

  public function __construct(array $request)
  {
    $this->request = $request;
  }

  public function getParams(): array
  {
    return $this->request;
  }
}
