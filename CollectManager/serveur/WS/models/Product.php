<?php

class Product implements JsonSerializable {

  private $id;
  private $idProduct;
  private $name;
  private $fkGroupProducts;
  private $quantity;
  private $unity;

  public function __construct(string $idProduct,
                              string $name,
                              int $fkGroupProducts,
                              int $quantity,
                              string $unity) {
    $this->id = NULL;
     $this->idProduct = $idProduct;
     $this->name = $name;
     $this->fkGroupProducts = $fkGroupProducts;
     $this->quantity = $quantity;
     $this->unity = $unity;
  }

  public function getId() { return $this->id; }
  public function getIdProduct(): string { return $this->idProduct; }
  public function getFkGroupProducts(): int { return $this->fkGroupProducts; }
  public function getName(): string { return $this->name; }
  public function getQuantity(): int { return $this->quantity; }
  public function getUnity(): string { return $this->unity; }

  public function setId(int $id) { $this->id = $id; }

  public function jsonSerialize() {
    return get_object_vars($this);
  }


}




?>
