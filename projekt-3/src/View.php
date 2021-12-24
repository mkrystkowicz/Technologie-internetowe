<?php

declare(strict_types=1);

namespace App;

class View
{
  public array $params;

  public function render(array $params = []): void
  {
    require_once("pages/layout.php");
    $this->params = $params;
  }
}
