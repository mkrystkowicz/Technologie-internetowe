<?php $id = $params['id'];
$cartId = $params['cartId'];
$page = $params['page'];
$photo = $products[$id - 1]['photo'];
$title = $products[$id - 1]['title'];
$descrition = $products[$id - 1]['description'];
$price = $products[$id - 1]['price'];
?>
<div class="container">
  <div class="navigation-btn-container">
    <a href="?page=<?php echo $page ?>&menuType=list"><button class="btn">
        < Powrót</button></a>
  </div>
  <div class="product-container">
    <img src="<?php echo $photo ?>" alt="<?php echo $title ?>" />
    <p class="desc"><?php echo $descrition ?></p>
    <p class="desc"><?php echo $price ?>zł</p>
    <a href="/?page=<?php echo $page ?>&menuType=cart&cartId=<?php echo $cartId; ?>&productId=<?php echo $id ?>"><button class="btn">Zamów</button></a>
  </div>
</div>