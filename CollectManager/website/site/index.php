<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include("header.php");
session_start();
$conn = isset($_SESSION["id"]);
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
            <h1 class="animated fadeInLeftBig">Welcome to <span>Fight Food Fast</span></h1>
           <!-- <p class="animated fadeInRightBig">Bootstrap - Responsive Design - Retina Ready - Parallax</p> -->
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="connexion.php">Se Connecter</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/salade.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Say Hello to <span>Fight Food Fast</span></h1>
            <!-- <p class="animated fadeInRightBig">Bootstrap - Responsive Design - Retina Ready - Parallax</p> -->
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="connexion.php">Se Connecter</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/panier.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">We are <span>Creative</span></h1>
           <!--  <p class="animated fadeInRightBig">Bootstrap - Responsive Design - Retina Ready - Parallax</p> -->
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="connexion.php">Se Connecter</a>
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
            <li class="scroll active"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#services">Services</a></li> 
            <li class="scroll"><a href="#about-us">About Us</a></li>                     
            <li class="scroll"><a href="#portfolio">Portfolio</a></li>
            <?php if(!$conn){?>
            <li class="scroll"><a href="connexion.php">Connexion</a></li>
            <li class="scroll"><a href="inscription.php">S'inscrire</a></li>
            <?php }else{
              echo "<li class='scroll'><a href='espace_personel.php'>Mon espace</a></li>";
            }?>
            <li class="scroll"><a href="#contact">Contact</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <section id="services">
    <div class="container">

      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Nos Services</h2>
            <p>Tout nos services sont exclusivement réserver à nos chers adhérents </p>
          </div>
        </div> 
      </div>

      <div class="text-center our-services">
        <div class="row">

         

          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="350ms">
            <a href="conseils_anti_gaspillage.php">
              <div class="service-icon">
                <i class="fa fa-recycle"></i>
              </div>
            </a>
            <div class="service-info">
              <h3>Conseils anti-gaspillage</h3>
              <p>20 conseils essentiels pour réduire le gaspillage de vos aliments <br/></p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <a href="cours_de_cuisine.php">
              <div class="service-icon">
                 <i class="fa fa-spoon"></i>
              </div>
            </a>
            <div class="service-info">
              <h3>Cours de cuisine</h3>
              <p>Venez vous inscricre à nos cours de cuisine ! Et enfilez votre tablier! </p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <a href="partage_de_voiture.php">
              <div class="service-icon">
                <i class="fa fa-car"></i>
              </div>
            </a>
            <div class="service-info">
              <h3>Partage de véhicules</h3>
              <p>Besoin de véhicule ? c'est ici que ca se passe </p><br/>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
            <a href="echange_de_service_pap.php">
            <div class="service-icon">
              <i class="fa fa-comments"></i>
            </div>
          </a>
            <div class="service-info">
              <h3>Echange de services entre particuliers</h3>
              <p>Bricolage, électricité, plomberie,... </p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms">
            <a href="service_de_reparation.php">
            <div class="service-icon">
            <i class="fa fa-wrench"></i>
            </div>
          </a>
            <div class="service-info">
              <h3>Services de réparation </h3>
              <p>Vous avez besoin d'aide pour vos réparations ? Demandez de l'aide ici :) </p>
            </div>
          </div>

          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms">
            <a href="gardiennage.php">
            <div class="service-icon">
              <i class="fa fa-user-secret"></i>
            </div>
          </a>
            <div class="service-info">
              <h3>Gardiennage</h3>
              <p>Vous partez en vacances sans vos animaux ? Besoin de quelqu'un pour prendre soin d'eux jusqu'a votre retour ?</p>
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
          <h2>Nos tarifs</h2>
          <p>En devenant adhérant de notre association, vous aurez accées a de nombreux services pendant toute l'année </p>
        </div>
      </div>
      <div class="pricing-table">
        <div class="row">
          <div class="col-sm-3">
            <div class="single-table wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <h3>Basique</h3>
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
 
  <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="#">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> 2400 South Avenue A </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> +928 336 2000  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> support@oxygen.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.sitename.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
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