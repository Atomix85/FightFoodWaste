<?php
ini_set('error_reporting', E_ALL);
ini_set("display_errors", 1);
include("config.php");

$mail =$_POST['mail'];
$typeCon = $_POST["typeCon"];

if(strlen($typeCon) < 1){
	//header("Location: connexion.php?err=1");
}

$pwd = crypt($_POST["pwd"],"-FFW_75~#");

if($typeCon == "staff"){
	$type = 2;
	$answer = $bdd->prepare(" SELECT id FROM STAFF WHERE mail = :mail AND password = :password ");
}
else if($typeCon == "technician"){
	$type = 1;
	$answer = $bdd->prepare(" SELECT id FROM TECHNICIEN WHERE mail = :mail AND password = :password");
}
else if($typeCon == "adherent"){
	$type = 0;
	$answer = $bdd->prepare(" SELECT id FROM USERS WHERE mail = :mail AND password = :password");
}
$answer->execute(array(":mail"=>$_POST['mail'],":password"=>$pwd));
$data = $answer->fetch();

if (!isset($data['id']))
{
    header("Location: connexion.php?err=1");
}
else
{
    session_start();
    $_SESSION['id'] = $data['id'];
    $_SESSION["type"] = $type;
    header("Location: index.php");
}

?>