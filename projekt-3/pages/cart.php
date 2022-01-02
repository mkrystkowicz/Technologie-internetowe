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
        <p><?php echo $product['price']; ?></p>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
<p class="cart-total-price">Cena łącznie: <?php echo $totalPrice ?></p>
<a href="/?menuType=index&cartId=<?php echo $cartId ?>"><button class="btn">+ Dodaj produkt</button></a>