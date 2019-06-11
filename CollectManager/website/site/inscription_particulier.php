<?php
session_start();
$conn = isset($_SESSION["id"]);
if($conn){
  header("Location: index.php");
}

require_once('i18n/Language.php');
if ( !isset( $_SESSION['lang'] ) )
{
    $_SESSION['lang'] = 'fr';
}
Lang::initLang($_SESSION["lang"]);
?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php include("header.php");?>
</head>
<body>
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
            <li class="scroll"><a href="index.php"><?php Lang::i18n("home"); ?></a></li>
            <li class="scroll"><a href="index.php#services"><?php Lang::i18n("services"); ?></a></li>
            <?php if(!$conn){?>
            <li class="scroll"><a href="connexion.php"><?php Lang::i18n("loggin");?></a></li>
            <li class="scroll active"><a href="inscription.php"><?php Lang::i18n("register"); ?></a></li>
            <?php }else{
              if($_SESSION["type"] == 0){
                echo "<li class='scroll'><a href='espace_personel_particulier.php'>";
                  Lang::i18n("myspace");
                echo "</a></li>";
              }else if($_SESSION["type"] == 1){
                echo "<li class='scroll'><a href='espace_personel_technicien.php'>";
                  Lang::i18n("myspace");
                echo "</a></li>";
              }else if($_SESSION["type"] == 2){
                echo "<li class='scroll'><a href='espace_personel_staff.php'>";
                  Lang::i18n("mystaff");
                echo "</a></li>";
              }
            }?>
            <?php include("i18n/selectLang.php");?>        
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->

 <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2><?php Lang::i18n("register"); ?></h2>
            <p><?php Lang::i18n("individual"); ?></p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <?php 
            if(isset($_GET["err"])){
              echo "<span style='color:red;'>";
              if($_GET["err"] == 1){
                echo "Information(s) incorrecte(s)";
              }else if($_GET["err"] == 2){
                echo "Votre code postal n'est pas répertorié";
              }
              echo "</span>";
            }
          ?>
          <form id="main-contact-form" name="contact-form" method="post" action="treatment_inscription_particulier.php">

            <div class="row">
              <div class="col-sm-6">

                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="<?php Lang::i18n('name'); ?>" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="fristname" class="form-control" placeholder="<?php Lang::i18n('firstname'); ?>" required="required">
                    </div>
                  </div>


                </div>

                 <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="<?php Lang::i18n('mail'); ?>" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="<?php Lang::i18n('password'); ?>" required="required">
                    </div>
                  </div>
                </div>

                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="tel" name="tel" class="form-control" placeholder="<?php Lang::i18n('phone'); ?>" required="required">
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="date" name="birthday" class="form-control" placeholder="<?php Lang::i18n('birthday'); ?>" required="required">
                    </div>
                  </div>
                </div>

              </div>
             

              <div class="col-sm-6">

              <div class="col-sm-4">
                <div class="form-group">
                  <input type="number" name="number_adress_volunteer" class="form-control" placeholder="<?php Lang::i18n('noaddress'); ?>" required="required">
                </div>
              </div>

              <div class="col-sm-8">
                <div class="form-group">
                  <input type="text" name="adress_volunteer" class="form-control" placeholder="<?php Lang::i18n('addressname'); ?>" required="required">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="postal_code" class="form-control" placeholder="<?php Lang::i18n('cedex'); ?>" required="required">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="country" class="form-control" placeholder="<?php Lang::i18n('country'); ?>" required="required">
                </div>
              </div>

              </div>
              <div class="col-sm-4 col-sm-offset-4">
                <div class="form-group">
                  <button type="submit" class="btn-submit"><?php Lang::i18n('register'); ?></button>
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


