<?php

namespace MyApp\models;
use MyApp\models\Product;

class Book extends Product {

  static protected $columns = ['id', 'sku', 'name', 'price', 'weight'];

  public function __construct($args=[]) {
    $this->sku = $args['sku'] ?? '';
    $this->name = $args['name'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->weight = $args['weight'] ?? '';
  }
}

?>