<?php
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
$request2 = $bdd->prepare("DELETE FROM COLLECT WHERE fk_grp_products = :id");
$answer = $request2->execute(array("id"=>$idGrp));
$request = $bdd->prepare("DELETE FROM GROUP_PRODUCTS WHERE id = :id");
$answer = $request->execute(array("id"=>$idGrp));

echo "OK";

?>