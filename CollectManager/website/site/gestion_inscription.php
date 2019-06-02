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
  </header><!--/#home-->
  <body>

  <section id="team">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Gestionnaire des inscriptions</h2>
          <p>Commercants ? Bénévoles ? Adhérents ?</p>
        </div>
      </div>
      <div class="team-members">
        <div class="row">
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="member-image">
                <a href="gestion_inscription_commercant.php"><img class="img-responsive" src="images/commercant.jpg" alt=""></a>
              </div>
              <div class="member-info">
                <h3>Commercants</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
              <div class="member-image">
                <a href="gestion_inscription_benevole.php"><img class="img-responsive" src="images/benevoles.jpg" alt=""></a>
              </div>
              <div class="member-info">
                <h3>Bénévoles</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
              <div class="member-image">
                <a href="gestion_inscription_adherent.php"><img class="img-responsive" src="images/adherent.jpg" alt=""></a>
              </div>
              <div class="member-info">
                <h3>Adhérents</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
              <div class="member-image">
                <a href="gestion_inscription_staff.php"><img class="img-responsive" src="images/staff.png" alt=""></a>
              </div>
              <div class="member-info">
                <br/><br/>
                <h3>Personnels</h3>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </div>
  </section><!--/#team-->
 </body>
</html>
               