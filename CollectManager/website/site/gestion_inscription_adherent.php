<!DOCTYPE html>
<html>
<?php 
  include("config.php");
  include("header.php");
?>

<head>
    <title>Gestion des stocks</title>
</head>

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
            <li class="scroll"><a href="gestion_inscription.php">Gestion des inscriptions</a></li>
            <li class="scroll"><a href="gestion_stock.php">Gestion des stocks</a></li>            
            <li class="scroll"><a href="gestion_tourner.php">Gestion des tournées</a></li>
            <li class="scroll"><a href="gestion_collecte.php">Gestion des collectes</a></li>
            <li class="scroll"><a href="#">A venir </a></li>
            <li class="scroll"><a href="#">A venir</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->


  <?php

   include("table_create_member.php");

   $returnString="";
   $returntable=table_Create_Member("SELECT name,fname,age,pays,formule,validation FROM Adherent;",
     array('name','fname','age','pays','formule','validation'));
     if($returntable!="0"){
        $returnString.= "<h3>"."</h3><div>".$returntable."</div>";
       }
     echo $returnString;

     ?>



</html>
               