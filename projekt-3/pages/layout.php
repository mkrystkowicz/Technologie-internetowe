<?php $page = $params['page'] ?? 'index' ?>
<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/home.css" />
  <link rel="stylesheet" href="./style/menu.css" />
  <link rel="stylesheet" href="./style/product.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet" />
  <title>Schabowe Babuni</title>
</head>

<body>
  <header>
    <div class="container">
      <a href="/"> <img src="../assets/logo.png" alt="logo" class="logo" /></a>
      <div class="slogan">
        <q>Z naszym jedzeniem poczujesz sie jak w domu.</q>
      </div>
    </div>
  </header>
  <main>
    <?php require_once("pages/${page}.php"); ?>
  </main>
  <footer>
    <div class="container">
      <div class="col contact">
        <p class="title">Dane kontaktowe:</p>
        <p>Al. Ujazdowskie 11</p>
        <p>00-950 Warszawa</p>
        <p>tel. 22 52 12 888</p>
        <p>email: kontakt@schabowebabuni.pl</p>
      </div>
      <div class="col site-map">
        <p class="title">Mapa witryny:</p>
        <p><a href="/">Strona główna</a></p>
        <p><a href="?page=appetizer">Przystawki</a></p>
        <p><a href="?page=main-dish">Dania główne</a></p>
        <p><a href="?page=drinks">Koktajle i inne napoje</a></p>
      </div>
    </div>
  </footer>
</body>

</html>