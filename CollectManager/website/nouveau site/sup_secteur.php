<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 1){
  echo "NOK";
  die;
}
include("config.php");

$id = $_GET["id"];
if(!isset($id)){
  echo "NOK";
  die;
}

$request = $bdd->prepare("DELETE FROM SECTEUR_TECHNICIEN WHERE fk_technicien = :com AND fk_secteur = :secteur");
$answer = $request->execute(array("com"=>$_SESSION["id"], "secteur"=>$id));

if($answer){
	echo "OK";
}
?>