<?php

class Product implements JsonSerializable {

  private $id;
  private $idProduct;
  private $name;
  private $fkGroupProducts;
  private $quantity;
  private $unity;

  public function __construct( $idProduct,
                               $name,
                               $fkGroupProducts,
                               $quantity,
                               $unity) {
    $this->id = NULL;
     $this->idProduct = $idProduct;
     $this->name = $name;
     $this->fkGroupProducts = $fkGroupProducts;
     $this->quantity = $quantity;
     $this->unity = $unity;
  }

  public function getId() { return $this->id; }
  public function getIdProduct() { return $this->idProduct; }
  public function getFkGroupProducts() { return $this->fkGroupProducts; }
  public function getName(){ return $this->name; }
  public function getQuantity() { return $this->quantity; }
  public function getUnity() { return $this->unity; }

  public function setId( $id) { $this->id = $id; }

  public function jsonSerialize() {
    return get_object_vars($this);
  }


}




?>
