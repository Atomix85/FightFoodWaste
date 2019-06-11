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
<body>
   <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>S'inscrire</h2>
            <p>Personnel</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <form id="main-contact-form" name="contact-form" method="post" action="treatment_inscription_staff.php">

            <div class="row">
              <div class="col-sm-6">

                <div class="row wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Nom" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="fristname" class="form-control" placeholder="Prenom" required="required">
                    </div>
                  </div>


                </div>

                 <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Addresse mail" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                    </div>
                  </div>
                </div>

                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="tel" name="tel" class="form-control" placeholder="Telephone" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="date" name="birthday" class="form-control" placeholder="Date de naissance" required="required">
                    </div>
                  </div>
                </div>

              </div>
             
            <div class="col-sm-6">

              <div class="col-sm-4">
                <div class="form-group">
                  <input type="number" name="number_adress_staff" class="form-control" placeholder="Numero de rue" required="required">
                </div>
              </div>

              <div class="col-sm-8">
                <div class="form-group">
                  <input type="text" name="adress_staff" class="form-control" placeholder="Votre adresse domicile" required="required">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="number" name="postal_code" class="form-control" placeholder="Code Postal" required="required">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="country" class="form-control" placeholder="Pays" required="required">
                </div>
              </div>
            </div>

              <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </div>


              </form>   
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
</body>
</html>
               