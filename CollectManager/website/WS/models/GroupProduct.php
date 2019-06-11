<?php

class GroupProduct implements JsonSerializable {

  private $id;
  private $isValid;
  private $fkUser;

  public function __construct( $isValid,
                               $fkUser) {
    $this->id = NULL;
     $this->isValid = $isValid;
     $this->fkUser = $fkUser;
  }

  public function getId() { return $this->id; }
  public function getIsValid() { return $this->isValid; }
  public function getFkUser() { return $this->fkUser; }

  public function setId( $id) { $this->id = $id; }

  public function jsonSerialize() {
    return get_object_vars($this);
  }


}




?>
