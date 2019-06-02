<?php
session_start();
?>

<!DOCTYPE html>
<html>
<?php include("header.php");
?>

<head>
	<title>Page de connexion</title>
</head>
<body>
  <section id="pageConnexion" class="parallax">
    <div class="container">
      <div class="row">
         <div class="heading text-center col-sm-8 col-sm-offset-3 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
         	<br/><br/><br/><br/><br/><br/>
              <?php

              if(isset($_GET['err'])){
                if($_GET['err'] == 1){
                  echo "<p style='color:red;'>Mot de passe ou identifiant incorrect</p>";
                }
              }

              ?>
              <form id="main-contact-form" name="contact-form" method="POST" action="treatment_connexion.php">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="email" name="mail" class="form-control black" placeholder="Mail" required="required">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <input type="password" name="pwd" class="form-control black" placeholder="Password" required="required">
                    </div>
                  </div>
                </div> 
                <div class="col-sm-4 col-sm-offset-2">                       
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
            </div>
              </form>   
            <br/><br/><br/><br/><br/><br/><br/>
</div>
</div>
</div>
</section>
</body>
</html>
