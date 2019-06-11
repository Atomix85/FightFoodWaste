<?php
	try{
		$bdd = new PDO("mysql:host=localhost;dbname=ffw","root","");
	}catch(Exception $ex){
		die($ex);
	}

	$user = $_POST["user"];
	$psw = crypt($_POST["psw"],"-FFW_75~#");
		
	$answer = $bdd->prepare(" SELECT id FROM USERS WHERE mail = :mail AND password = :password");
	$answer->execute(array(":mail"=>$user,":password"=>$psw));
	$data = $answer->fetch();
	//if(count($data) == 1)
	if(isset($data['id']))
		echo "ok";
	else
		echo "Identifiant incorrect !";
?>
