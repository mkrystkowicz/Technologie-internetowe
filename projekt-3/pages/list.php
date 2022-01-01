<div class="container">
  <div class="navigation-btn-container">
    <a href="/?menuType=index&cartId=<?php echo $cartId; ?>"><button class="btn">
        < Powrót</button></a>
  </div>
  <div class="menu">
    <?php foreach ($products ?? [] as $product) : ?>
      <div class="menu-item">
        <p class="title"><?php echo $product['title']; ?></p>
        <img class="img" src="<?php echo $product['photo'] ?>" alt="<?php echo $product['title']; ?>" />
        <a href="?page=<?php echo $page ?>&menuType=product&id=<?php echo $product['id']; ?>&cartId=<?php echo $cartId ?>"><button class="btn">Wybierz</button></a>
      </div>
    <?php endforeach; ?>
  </div>
</div>