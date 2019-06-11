<?php
session_start();
if(isset($_SESSION['frist_name']) && isset($_SESSION['name']) )
    	 echo '<p> Bienvenue' . ' ' .$_SESSION['frist_name'] . ' ' . $_SESSION['name'] . '! </p>';
?>

<!DOCTYPE html>
<html>
<head>
	<?php 
	include("header_marche.php");
	include("config.php");
	 ?>
</head>
<body>

	<body id="Connexion">
	<div id="frame7">

		<header>
			<h1 class="col-sm-offset-1"> Se connecter : </h1>
		</header>

		<form class="col-xs-offset-1" method = "POST" action="treatment_connexion.php">
		    <fieldset>
		     

		         <label for ="mail"> Adresse email :  </label>
		         <input type="email" name="mail" id="mail" />
		         

		         <br/><label for = "pwd"> Mot de passe :  </label>
		         <input type="password" name="pwd" id="pwd" >


		         <br/><input type="submit" id="sent"/>
		     
		     </fieldset>
		</form>
		</div>


		</body>
		</html>
