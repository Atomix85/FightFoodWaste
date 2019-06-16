<?php
session_start();
$conn = isset($_SESSION["id"]);

require_once('i18n/Language.php');
if ( !isset( $_SESSION['lang'] ) )
{
    $_SESSION['lang'] = 'fr';
}
Lang::initLang($_SESSION["lang"]);

?>
<!DOCTYPE html>
<html lang="en">
<?php
include("header.php");
?>
<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
    <?php
      if(!$conn){
    ?>
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/pomme.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><?php Lang::i18n("welcome"); ?></h1>
           <!-- <p class="animated fadeInRightBig">Bootstrap - Responsive Design - Retina Ready - Parallax</p> -->
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="connexion.php"><?php Lang::i18n("loggin"); ?></a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/salade.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><?php Lang::i18n("welcome"); ?></h1>
            <!-- <p class="animated fadeInRightBig">Bootstrap - Responsive Design - Retina Ready - Parallax</p> -->
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="connexion.php"><?php Lang::i18n("loggin"); ?></a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/panier.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig"><?php Lang::i18n("welcome"); ?></h1>
           <!--  <p class="animated fadeInRightBig">Bootstrap - Responsive Design - Retina Ready - Parallax</p> -->
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="connexion.php"><?php Lang::i18n("loggin"); ?></a>
          </div>
        </div>
      </div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div><!--/#home-slider-->
    <?php }?>
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
            <li class="scroll active"><a href="#home"><?php Lang::i18n("home"); ?></a></li>
            <li class="scroll"><a href="#services"><?php Lang::i18n("services"); ?></a></li>
            <?php if(!$conn){?>
            <li class="scroll"><a href="connexion.php"><?php Lang::i18n("loggin"); ; ?></a></li>
            <li class="scroll"><a href="inscription.php"><?php Lang::i18n("register"); ?></a></li>
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
              }else if($_SESSION["type"] == 3){
                echo "<li class='scroll'><a href='espace_personel_commercant.php'>";
                  Lang::i18n("myspace");
                echo "</a></li>";
              }
            }?>
            <?php include("i18n/selectLang.php");?>     
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <section>
    <div id="overlayGL">
    </div>
    <script src="webgl/libs/three.js"></script>
    <script src="webgl/libs/ColladaLoader.js"></script>
    <script src="webgl/STOCKGL.js"></script>
  </section>



  <section id="services">
    <div class="container">

      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2><?php Lang::i18n("usservices"); ?></h2>
            <p><?php Lang::i18n("usservices.desc"); ?></p>
          </div>
        </div> 
      </div>

      <div class="text-center our-services">
        <div class="row">

         

          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="350ms">
            <a href="anti_waste_advice.php">
              <div class="service-icon">
                <i class="fa fa-recycle"></i>
              </div>
            </a>
            <div class="service-info">
              <h3><?php Lang::i18n("nowastetips"); ?></h3>
              <p><?php Lang::i18n("nowastetips.desc"); ?><br/></p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <a href="cooked.php">
              <div class="service-icon">
                 <i class="fa fa-spoon"></i>
              </div>
            </a>
            <div class="service-info">
              <h3><?php Lang::i18n("cooklesson"); ?></h3>
              <p><?php Lang::i18n("cooklesson.desc"); ?></p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <a href="car.php">
              <div class="service-icon">
                <i class="fa fa-car"></i>
              </div>
            </a>
            <div class="service-info">
              <h3><?php Lang::i18n("carshare"); ?></h3>
              <p><?php Lang::i18n("carshare.desc"); ?></p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
            <a href="help_service_exchange.php">
            <div class="service-icon">
              <i class="fa fa-comments"></i>
            </div>
          </a>
            <div class="service-info">
              <h3><?php Lang::i18n("servicesexchange"); ?></h3>
              <p><?php Lang::i18n("servicesexchange.desc"); ?></p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms">
            <a href="repear_service.php">
            <div class="service-icon">
            <i class="fa fa-wrench"></i>
            </div>
          </a>
            <div class="service-info">
              <h3><?php Lang::i18n("repairservices"); ?></h3>
              <p><?php Lang::i18n("repairservices.desc"); ?></p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms">
            <a href="caretaking.php">
            <div class="service-icon">
              <i class="fa fa-user-secret"></i>
            </div>
          </a>
            <div class="service-info">
              <h3><?php Lang::i18n("caretaking"); ?></h3>
              <p><?php Lang::i18n("caretaking.desc"); ?></p>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section><!--/#services-->
  
  
  <section id="pricing">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2><?php Lang::i18n("ustariff"); ?></h2>
          <p><?php Lang::i18n("ustariff.desc"); ?></p>
        </div>
      </div>
      <div class="pricing-table">
        <div class="row">
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <h3><?php Lang::i18n("ustariff.desc"); ?></h3>
              <div class="price">
                $39.99<span>/An</span>
              </div>
              <ul>
                <li>Conseils anti gaspillage</li>
                <li>Cours de cuisine</li>
              </ul>
              <a href="inscription_adherent.php" class="btn btn-lg btn-primary">Adhérer</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
              <h3>Standard</h3>
              <div class="price">
                $59.99<span>/An</span>                                
              </div>
              <ul>
                <li>Conseils anti gaspillage</li>
                <li>Cours de cuisine</li>
                <li>Echange de services entre particuliers</li>
              </ul>
              <a href="inscription_adherent.php" class="btn btn-lg btn-primary">Adhérer</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table featured wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
              <h3>Featured</h3>
              <div class="price">
                $79.99<span>/An</span>                                
              </div>
              <ul>
               <li>Conseils anti gaspillage</li>
                <li>Cours de cuisine</li>
                <li>Echange de services entre particuliers</li>
                <li>Gardiennage</li>
              </ul>
              <a href="inscription_adherent.php" class="btn btn-lg btn-primary">Adhérer</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="1100ms">
              <h3>Professional</h3>
              <div class="price">
                $99.99<span>/An</span>                    
              </div>
              <ul>
                  <li>Conseils anti gaspillage</li>
                <li>Cours de cuisine</li>
                <li>Echange de services entre particuliers</li>
                <li>Gardiennage</li>
                <li>Partage de véhicules</li>
              </ul>
              <a href="inscription_adherent.php" class="btn btn-lg btn-primary">Adhérer</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#pricing-->

 

  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
          <a href="index.php"><img src="images/logo.png" alt=""></a>
        </div>
        <div class="social-icons">
          <ul>
            <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="tumblr" href="#"><i class="fa fa-tumblr-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  
  </footer>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>