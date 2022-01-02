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

  public function addToCart(string $cartId, string $category, string $productId): void
  {
    if (!$cartId || !$productId) {
      return;
    }

    $sql = "INSERT INTO cart VALUES ('$cartId', '$category', '$productId')";
    mysqli_query($this->conn, $sql);
  }

  public function getCart(string $cartId): array
  {
    $sql = "SELECT * FROM `cart` WHERE `cart_id` = '$cartId'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      $arr = [];
      while ($row = $result->fetch_assoc()) {
        $arr[] = [
          'cartId' => $row['cart_id'],
          'category' => $row['category'],
          'productId' => $row['product_id'],
        ];
      }
      return $arr;
    } else {
      echo "0 results";
    }
  }

  public function getProduct(string $category, string $productId): array
  {
    $sql = "SELECT * FROM `$category` WHERE `id` = '$productId'";
    $result = $this->conn->query($sql);

    if ($result->num_rows > 0) {
      $arr = [];
      while ($row = $result->fetch_assoc()) {
        $arr[] = [
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
