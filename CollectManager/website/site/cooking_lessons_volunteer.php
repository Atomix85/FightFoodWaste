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
?>


 <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Cours de cuisine</h2>
            <p>Bénévole</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <form id="main-contact-form" name="contact-form" method="post" action="treatment_inscription_adherent.php">

            <div class="row">
              <div class="col-sm-6">

                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

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
                  <input type="number" name="number_adress_member" class="form-control" placeholder="Numero de rue" required="required">
                </div>
              </div>

              <div class="col-sm-8">
                <div class="form-group">
                  <input type="text" name="adress_member" class="form-control" placeholder="Votre adresse domicile" required="required">
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


       Veuillez sélectionner votre formule :<br />
       <input type="radio" name="formule" value="basic" id="basic" /><label for="basic"> Basic  </label>
       <input type="radio" name="formule" value="standard" id="standard" /><label for="standard">  Standard  </label>
       <input type="radio" name="formule" value="premium" id="premium" /><label for="premium">  Premium  </label>
       <input type="radio" name="formule" value="vip" id="vip" /> <label for="vip">  VIP  </label>
   


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
<?php
      }
    }else{
    ?>
      <meta http-equiv="refresh" content="0; url=connexion.php">
      <?php
    }
?>

</body>
</html>