<?php
try{
$bdd = new PDO('mysql:host=localhost;dbname=ffw', 'esgi', 'esgi75012');
}catch(Exception $ex){
	die($ex);
}
?>