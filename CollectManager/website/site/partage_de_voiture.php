<?php
session_start();

//ini_set('display_errors',1);
?>
<!DOCTYPE html>
<html>
<?php include("header.php");?>
<head>
  <title>Gardiennage</title>
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">
            <h1><img src="images/logo.png" alt="logo"></h1>
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="index.php">Home</a></li>
            <li class="scroll"><a href="#services">Services</a></li> 
            <li class="scroll"><a href="#about-us">About Us</a></li>                     
            <li class="scroll"><a href="#portfolio">Portfolio</a></li>
            <li class="scroll"><a href="#team">Team</a></li>
            <li class="scroll"><a href="inscription.php">S'inscrire</a></li>
            <li class="scroll"><a href="#contact">Contact</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
</head>
<body>
  <?php
  include("isMember.php");

    if(isset($_SESSION['mail'])){
      $email = $_SESSION['mail'];
      if(isMember($email)==1){
        ?>
        <meta http-equiv="refresh" content="0; url=inscription_adherent.php">
        <?php
      }else{
       
        
      }
    }else{
    ?>
      <meta http-equiv="refresh" content="0; url=connexion.php">
      <?php
    }
?>

</body>
</html>