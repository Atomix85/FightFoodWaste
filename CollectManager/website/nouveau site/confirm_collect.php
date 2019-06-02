<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 0){
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
$request = $bdd->prepare("UPDATE COLLECT SET is_confirmed = '1' WHERE fk_grp_products = :id");
$answer = $request->execute(array("id"=>$idGrp));
$request2 = $bdd->prepare("UPDATE GROUP_PRODUCT SET is_valid = '2' WHERE id = :id");
$answer = $request2->execute(array("id"=>$idGrp));
echo "OK";

?>