<?php 
function isVolunteer($email){

    include("config.php");

	$answer = $bdd->query(" SELECT name FROM Adherent  WHERE mail ='".$email."' AND validation = 1 ");
    $data = $answer->fetch();

    if($data)
    	return 0;
    else
    	return 1;
	
}

?>
