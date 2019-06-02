<?php 
function isStaff($email){

    include("config.php");

	$answer = $bdd->query(" SELECT name FROM Staff  WHERE email ='".$email."' ");
    $data = $answer->fetch();

    if($data)
    	return 0;
    else
    	return 1;
	
}

?>
