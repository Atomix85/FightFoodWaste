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
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
                <h1 class="text-center col-sm-8 col-sm-offset-2"> Historique des stocks </h1>
                <div class="col-sm-5">
                <?php
                $requete= $bdd->query("SELECT * FROM stock WHERE date_sortie_stock is NULL ORDER BY date_de_peremption DESC");
                echo "<table class='table'><caption class='text-center'>Historique des stocks disponible </caption><tr><th>Nom</th><th>Quantite</th><th>Date de peremption </th><th>Date d'entre au stock</th> </tr>";
                while($ligne=$requete->fetch()){
                               echo "<tr>";
                               echo "<td>".$ligne['name']."</td><td>" . $ligne['quantite'] . "</td><td>" . $ligne['date_de_peremption'] . "</td><td>" . $ligne['date_entre_stock'] . "</td></tr>";
                                echo "</tr>";
                }
                ?>
                </table>
              </div>

                <div class="col-sm-6 col-sm-offset-1">
                <?php
                $requete= $bdd->query("SELECT * FROM stock WHERE date_sortie_stock is not NULL ORDER BY date_de_peremption DESC");
                echo "<table class='table'><caption class='text-center' >Historique des stocks indisponible </caption><tr><th>Nom</th><th>Quantite</th><th>Date de peremption </th><th>Date d'entre au stock</th> </tr>";
                while($ligne=$requete->fetch()){
                               echo "<tr>";
                               echo "<td>".$ligne['name']."</td><td>" . $ligne['quantite'] . "</td><td>" . $ligne['date_de_peremption'] . "</td><td>" . $ligne['date_entre_stock'] . "</td></tr>";
                                echo "</tr>";
                }
               
               
                ?>
                </table>
              </div>
              <br/><br/>
                <a href="stock_dispo_pdf.php" class="btn btn-primary">Stock PDF disponible</a>
                <a href="stock_indispo_pdf.php" class="btn btn-primary">Stock PDF indisponible</a>
                </body>
                </html>
               