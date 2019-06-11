<?php
session_start();
if(!isset($_SESSION['id'])){
  echo "NOK";
  die;
}
include("header.php");

include("config.php");

$idProduct = $_GET["id"];
if(!isset($idProduct)){
  echo "NOK";
  die;
}

$request = $bdd->prepare("DELETE FROM PRODUCTS WHERE id = :id");
$answer = $request->execute(array("id"=>$idProduct));
echo "OK";

?>