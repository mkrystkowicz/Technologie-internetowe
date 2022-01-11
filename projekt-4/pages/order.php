<?php

use App\PageController;

$order = [
  'name' => $params['name'],
  'street' => $params['street'],
  'city' => $params['city'],
  'number' => $params['number'],
  'cartId' => $params['cartId'],
  'email' => $params['email'],
];

(new PageController($_REQUEST, getConfig()))->placeOrder($order);
