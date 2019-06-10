<?php session_start();
if(!isset($_SESSION['id']) || ($_SESSION["type"] != 1 && $_SESSION["type"] != 2)){
  echo "NOK";
  die;
}

include("config.php");

$grp = $_GET["id"];
if(!isset($grp)){
  echo "NOK";
  die;
}
if(!isset($_GET["v"])){
  $_GET["v"] = "2";
}

$request = $bdd->prepare("UPDATE COLLECT SET is_confirmed = :v WHERE fk_grp_products = :grp");
$request->execute(array(":grp"=>$grp,":v"=>$_GET["v"]));

$COLLECT = $request->fetchAll();
echo "OK";
?>