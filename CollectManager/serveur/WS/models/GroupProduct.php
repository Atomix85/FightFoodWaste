<?php

class GroupProduct implements JsonSerializable {

  private $id;
  private $isValid;
  private $fkUser;

  public function __construct(int $isValid,
                              int $fkUser) {
    $this->id = NULL;
     $this->isValid = $isValid;
     $this->fkUser = $fkUser;
  }

  public function getId() { return $this->id; }
  public function getIsValid(): int { return $this->isValid; }
  public function getFkUser(): int { return $this->fkUser; }

  public function setId(int $id) { $this->id = $id; }

  public function jsonSerialize() {
    return get_object_vars($this);
  }


}




?>
