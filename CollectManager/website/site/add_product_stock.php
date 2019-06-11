<?php
session_start();
require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);
if(!isset($_SESSION['id']) || $_SESSION["type"] != 2){
  header('Location: index.php');
}

$en = $_POST["entrepot"];
if(!isset($en) || strlen($en) == 0){
  Lang::i18n("invalidplacement");
  die();
}

$se = $_POST["secteur"];
if(!isset($se) || strlen($se) == 0){
  Lang::i18n("invalidplacement");
  die();
}

$co = $_POST["couloir"];
if(!isset($co) || strlen($co)== 0){
  Lang::i18n("invalidplacement");
  die();
}

$bl = $_POST["bloc"];
if(!isset($bl) || strlen($bl) == 0){
  Lang::i18n("invalidplacement");
  die();
}

$product = $_POST["product"];
if(!isset($product)){
  echo "NOK";
  die();
}

include("config.php");

$request = $bdd->prepare("INSERT INTO STOCK (entrepot, secteur, couloir, bloc, fk_product,date_arrive) VALUES 
	(:en, :se, :co, :bl, :product, NOW())");
$request->execute(array(
	":en"=>$en,
	":se"=>$se,
	":co"=>$co,
	":bl"=>$bl,
	":product"=>$product));

if($request->rowCount() > 0) echo "OK";
else{
	Lang::i18n("usedplacement");
	die();
}

$request2 = $bdd->prepare("UPDATE PRODUCTS SET is_stocked = '1' WHERE id = :id");
$request2->execute(array(":id"=>$product));
?>