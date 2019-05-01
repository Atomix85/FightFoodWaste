<?php

require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../utils/DatabaseManager.php';

class ProductService {

  private static $instance;

  private function __construct() {}

  public static function getInstance() {
    if(!isset(self::$instance)) {
      self::$instance = new ProductService();
    }
    return self::$instance;
  }

  public function insert(Product $product): Product {
    $db = DBManager::getManager();
    $affectedRows = $db->exec('
    INSERT INTO
    PRODUCTS
    (idProduct,fk_group_product,name,quantity_unit,quantity)
    VALUES
    (?,?,?,?,?)
    ', [
      $product->getIdProduct(),
      $product->getFkGroupProducts(),
      $product->getName(),
      $product->getUnity(),
      $product->getQuantity()
    ]);
    if($affectedRows > 0) {
      $product->setId($db->lastInsertId());
      return $product;
    }
    return NULL;
  }

}



?>
