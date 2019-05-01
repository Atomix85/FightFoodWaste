<?php
	try{
		$pto = new PDO("mysql:host=localhost;dbname=ffw","phpmyadmin","sexecool");
	}catch(Exception $ex){
		die($ex);
	}
	if($_POST["user"] == "alan" && $_POST["psw"] == "1234"){
		echo "ok";
	}else{
		echo "nok";
	}
?>
