<?php

namespace App;

class CartController
{
  private string $cartId;

  public function __construct()
  {
    $this->initCart();
  }

  public function getCartId(): string
  {
    return $this->cartId;
  }

  public function setCart(string $id): void
  {
    $this->cartId = $id;
  }

  private function initCart(): void
  {
    $this->setCart(uniqid());
  }
}
