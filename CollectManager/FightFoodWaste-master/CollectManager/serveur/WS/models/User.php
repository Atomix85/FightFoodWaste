<?php

class User implements JsonSerializable {

  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $tel;
  private $password;

  public function __construct(string $nom,
                              string $prenom,
                              string $mail,
                              string $tel,
                              string $password) {
    $this->id = NULL;
     $this->nom = $nom;
     $this->prenom = $prenom;
     $this->mail = $mail;
     $this->tel = $tel;
     $this->password = $password;
  }

  public function getId() { return $this->id; }
  public function getNom(): string { return $this->nom; }
  public function getPrenom(): string { return $this->prenom; }
  public function getMail(): string { return $this->mail; }
  public function getTel(): string { return $this->tel; }
  public function getPassword(): string { return $this->password; }

  public function setId(int $id) { $this->id = $id; }

  public function jsonSerialize() {
    return get_object_vars($this);
  }


}




?>
