<?php session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 2){
  header('Location: index.php');
}

include("config.php");

$grp = $_GET["id"];
if(!isset($grp)){
  echo "NOK";
  die;
}

$request = $bdd->prepare("UPDATE COLLECT SET is_confirmed = '2' WHERE fk_grp_products = :grp");
$request->execute(array(":grp"=>$grp));

$COLLECT = $request->fetchAll();
echo "OK";
?>