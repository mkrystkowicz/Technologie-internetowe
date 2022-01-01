<?php

declare(strict_types=1);

namespace App;

use App\Database\DatabaseController;

spl_autoload_register(function (string $classNamespace) {
  $path = str_replace(['\\', 'App/'], ['/', ''], $classNamespace);
  $path = "src/$path.php";
  require_once($path);
});

$dbConfig = require_once('src/config.php');
require_once('src/Utlls/debug.php');

(new PageController($_REQUEST, $dbConfig))->render();
