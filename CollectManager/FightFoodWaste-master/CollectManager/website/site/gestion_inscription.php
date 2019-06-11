<!DOCTYPE html>
<html>
<?php 
  include("config.php");
  include("header.php");
?>
<head>
    <title>Gestion des stocks</title>
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
            <li class="scroll"><a href="gestion_inscription.php">Gestion des inscriptions</a></li>
            <li class="scroll"><a href="gestion_stock.php">Gestion des stocks</a></li>            
            <li class="scroll"><a href="gestion_tourner.php">Gestion des tournées</a></li>
            <li class="scroll"><a href="gestion_collecte.php">Gestion des collectes</a></li>
            <li class="scroll"><a href="#">A venir </a></li>
            <li class="scroll"><a href="#">A venir</a></li>       
          </ul>

        </div>

        <div class="collapse navbar-collapse ">
          <ul class="nav navbar-nav navbar-right">                 
           <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Gestion des inscriptions
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="gestion_inscription_benevole.php">Bénévoles</a><br/>
      <a class="dropdown-item" href="gestion_inscription_commercant.php">Commercants</a><br/>
      <a class="dropdown-item" href="gestion_inscription_adherent.php">Adhérents</a><br/>
      <a class="dropdown-item" href="gestion_inscription_personnel.php">Personnels</a>
    </div>
  </div>

          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

                <h1 class="text-center col-sm-8 col-sm-offset-2"> Liste des inscriptions en attente de validation </h1>
                <div class="col-sm-8 col-sm-offset-2">

                <?php
                // false = 0 
                $requete= $bdd->query("SELECT * FROM user WHERE validation is false");
                echo "<table class='table'><caption class='text-center'>Inscription en attente </caption><tr><th>Nom</th><th>Prenom</th><th>Année de naissance </th><th>Validation</th> </tr>";
                while($ligne=$requete->fetch()){
                               echo "<tr>";
                               echo "<td>".$ligne['name']."</td><td>" . $ligne['fname'] . "</td><td>" . $ligne['birthday'] . "</td><td>" . $ligne['validation'] . "</td></tr>";
                                echo "</tr>";
                }
                ?>
                </table>
              </div>

              <br/><br/>
                <a href="stock_dispo_pdf.php" class="btn btn-primary">Stock PDF disponible</a>
                </body>
                </html>
               