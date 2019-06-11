<?php
include("config.php");
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 1){
  echo "NOK";
  die;
}
$idGrp = $_POST["grp"];
if(!isset($idGrp)){
  echo "NOK";
  die;
}
$date = $_POST["date"];
if(!isset($date)){
  echo "NOK";
  die;
}
$msg = $_POST["msg"];
if(!isset($msg)){
  echo "NOK";
  die;
}
    

    $request = $bdd->prepare("INSERT INTO COLLECT (fk_grp_products, fk_technicien, date_ramassage, message, is_confirmed) VALUES (:grp, :com, :_date, :msg, :conf)");
    $data = $request->execute(array(
      ":grp"=>$idGrp,
      ":com"=>$_SESSION["id"],
      ":_date"=>$date,
      ":msg"=>$msg,
      "conf"=>0
    ));
    if(!$data){
      echo "NOK";
      die;
    }
    $request2 = $bdd->prepare("UPDATE GROUP_PRODUCTS SET is_valid = '2' WHERE id = :grp");
    $data = $request2->execute(array(":grp"=>$idGrp));
    if($data){
      echo "OK";
      die;
    }
    echo "NOK";

?>