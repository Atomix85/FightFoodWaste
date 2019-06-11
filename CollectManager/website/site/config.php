<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=ffw', 'root', '');
}catch(Exception $ex){
	die($ex);
}
?>