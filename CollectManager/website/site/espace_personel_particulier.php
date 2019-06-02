<!DOCTYPE html>
<html>
<?php
session_start();
if(!isset($_SESSION['id'])){
  header('Location: index.php');
}
include("header.php");
?>
<head>
    <title>Espace personnel - PARTICULIER</title>
</head>

    </div><!--/#home-slider-->
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
            <li class="scroll"><a href="gestion_product.php">Gestion de vos produits</a></li>
            <li class="scroll"><a href="deconnect.php">Se déconnecter</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>



</body>
</html>
    