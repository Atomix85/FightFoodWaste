<?php

class User implements JsonSerializable {

  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $tel;
  private $password;

  public function __construct($nom,
                              $prenom,
                               $mail,
                               $tel,
                               $password) {
    $this->id = NULL;
     $this->nom = $nom;
     $this->prenom = $prenom;
     $this->mail = $mail;
     $this->tel = $tel;
     $this->password = $password;
  }

  public function getId() { return $this->id; }
  public function getNom() { return $this->nom; }
  public function getPrenom() { return $this->prenom; }
  public function getMail() { return $this->mail; }
  public function getTel() { return $this->tel; }
  public function getPassword() { return $this->password; }

  public function setId( $id) { $this->id = $id; }

  public function jsonSerialize() {
    return get_object_vars($this);
  }


}




?>
