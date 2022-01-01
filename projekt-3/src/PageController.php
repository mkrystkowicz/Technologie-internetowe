<?php

declare(strict_types=1);

namespace App;

use App\Database\DatabaseController;

class PageController extends DatabaseController
{
  private $view;
  private array $params;
  private array $products;
  private ?string $cartId = null;

  public function __construct(array $request = [], array $config)
  {
    $this->pageInit($request, $config);
  }

  public function render()
  {
    $this->view->render($this->params, $this->products, $this->cartId);
  }

  private function pageInit(array $request, array $config): void
  {
    $this->createConnection($config);
    $this->view = new View();
    $this->params = $request;
    $this->products = $this->getProducts($this->params['page'] ?? null);
    $this->cartId = $this->params['cartId'] ?? null;

    if ($this->cartId === null) {
      $this->cartId = (new CartController)->getCartId();
    }
  }
}
