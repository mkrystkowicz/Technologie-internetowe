<?php

declare(strict_types=1);

namespace App;

class View
{
  public function render(array $params = [], array $products): void
  {
    require_once("pages/layout.php");
  }
}
