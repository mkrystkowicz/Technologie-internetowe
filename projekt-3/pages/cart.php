<?php

use App\PageController;

$dbConfig = getConfig();

$cartId = $params['cartId'];
$page = $params['page'];
$productId = $params['productId'] ?? null;

$pageController = new PageController($_REQUEST, $dbConfig);

if ($productId) {
  $pageController->addToCart($cartId, $page, $productId);
}

$cart = $pageController->getCart($cartId);
$products = [];
$totalPrice = 0;

foreach ($cart as $key => $value) {
  $productCategory = $cart[$key]['category'];
  $productId = $cart[$key]['productId'];
  $product = $pageController->getProduct($productCategory, $productId);
  $products[] = $product[0];
  $totalPrice += $product[0]['price'];
}

?>

<div class="order-container">
  <div>
    <ul class="cart-products">
      <?php foreach ($products as $product) : ?>
        <li class="cart-item">
          <div class="cart-item-image">
            <img src="<?php echo $product['photo'] ?>" alt="<?php echo $product['title'] ?>">
          </div>
          <div class="cart-item-text">
            <p>
              <?php echo $product['title'] ?>
            </p>
            <p>
              <?php echo $product['description'] ?>
            </p>
            <p><?php echo $product['price']; ?>zł</p>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
    <p class="cart-total-price">Cena łącznie: <?php echo $totalPrice ?>zł</p>
    <a href="/?menuType=index&cartId=<?php echo $cartId ?>"><button class="btn">+ Dodaj produkt</button></a>
  </div>
  <form class="order-form" action="?menuType=order&cartId=<?php echo $cartId ?>" method="POST">
    <div class="input-container">
      <input type="text" name="name" class="input">
      <label for="name" class="input-label">Imie</label>
    </div>
    <div class="input-container">
      <input type="text" name="street" class="input">
      <label for="street" class="input-label">Ulica</label>
    </div>
    <div class="input-container">
      <input type="text" name="city" class="input">
      <label for="city" class="input-label">Miasto</label>
    </div>
    <div class="input-container">
      <input type="text" name="number" class="input">
      <label for="number" class="input-label">Nr tel</label>
    </div>
    <div class="input-container">
      <input type="email" name="email" class="input">
      <label for="email" class="input-label">E-mail</label>
    </div>
    <button class="btn" type="submit">Zamów</button>
  </form>
</div>