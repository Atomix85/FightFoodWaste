<?php
ini_set("display_errors", 1);
include("config.php");

$mail =$_POST['mail'];
//$_SESSION['mail']=$mail;

$pwd = crypt($_POST["pwd"],"-FFW_75~#");

$answer = $bdd->prepare(" SELECT id FROM TECHNICIEN WHERE mail = :mail AND password = :password");
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
    $_SESSION["type"] = 1;
    header("Location: espace_personel_technicien.php");
}

?>