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

$request = $bdd->prepare("INSERT INTO SECTEUR_TECHNICIEN (fk_technicien, fk_secteur) VALUES (:com, :secteur)");
$answer = $request->execute(array("com"=>$_SESSION["id"], "secteur"=>$id));

if($answer){
	echo "OK";
}
?>