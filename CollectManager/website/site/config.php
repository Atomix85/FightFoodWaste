<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=ffw', 'root', 'root');
}catch(Exception $ex){
	die($ex);
}
?>