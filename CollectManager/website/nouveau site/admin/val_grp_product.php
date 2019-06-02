<?php
ini_set("SMTP","smtp.free.fr");
ini_set("sendmail_from","bretellealan@hotmail.fr");
session_start();
if(!isset($_SESSION['id'])){
  echo "NOK";
  die;
}
include("header.php");

include("config.php");

$idGrp = $_GET["id"];
if(!isset($idGrp)){
  echo "NOK";
  die;
}

$request = $bdd->prepare("UPDATE GROUP_PRODUCTS SET is_valid = '1' WHERE id = :id");
$answer = $request->execute(array("id"=>$idGrp));
echo "OK";

//mail("bretellealan@hotmail.fr","hello","test");

?>