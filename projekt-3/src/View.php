<?php

declare(strict_types=1);

namespace App;

class View
{
  public function render(array $params = [], array $products, string $cartId): void
  {
    require_once("pages/layout.php");
  }
}
