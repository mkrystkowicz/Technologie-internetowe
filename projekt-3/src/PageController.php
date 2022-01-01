<?php

declare(strict_types=1);

namespace App;


use App\Database\DatabaseController;

class PageController extends DatabaseController
{
  private $view;
  private array $params;
  private array $products;
  public function __construct(array $request = [], array $config)
  {
    $this->createConnection($config);
    $this->view = new View();
    $this->params = $request;
    $this->products = $this->getProducts($this->params['page'] ?? null);
  }

  public function render()
  {
    $this->view->render($this->params, $this->products);
  }
}
