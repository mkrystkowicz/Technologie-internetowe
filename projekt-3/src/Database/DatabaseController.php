<?php

declare(strict_types=1);

namespace App\Database;

use mysqli;

abstract class DatabaseController
{
  protected mysqli $conn;
  public function __construct(array $config)
  {
    $this->createConnection($config);
  }

  protected function createConnection(array $config): void
  {
    $this->conn = new mysqli($config['host'], $config['username'], $config['password'], $config['database']);
  }

  public function getProducts(?string $products): array
  {
    if (!$products) {
      return [];
    }

    $sql = "SELECT * FROM `$products`";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      $arr = [];
      while ($row = $result->fetch_assoc()) {
        $arr[] = [
          'id' => $row['id'],
          'title' => $row['title'],
          'photo' => $row['photo'],
          'description' => $row['description'],
          'price' => $row['price'],
        ];
      }
      return $arr;
    } else {
      echo "0 results";
    }
  }
}
