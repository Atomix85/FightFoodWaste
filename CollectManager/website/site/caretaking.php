<?php
session_start();
require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);
if(!isset($_SESSION['id']) || ($_SESSION["type"] != 0 && $_SESSION["type"] != 4) ){
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<?php include("header.php");?>
<head>
  <title>Cours de cuisine</title>
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
              }
            }?>
            <?php include("i18n/selectLang.php");?>     
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
</head>
<body>

   <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Aide aux cuisines</h2>
            <p>Luttons ensemble contre le gaspillage ensemble ! </p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="treatment_caretaking.php">
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
                <p>Il vous reste des aliments sur le point de perimé ? Pas de panique, avec l'aide de notre communauté, veuillez saisir vos ingredients et nous ferons de notre mieux pour vous aider a préparer un bon petit plat/dessert ! :D A vos claviez !</p>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->


</body>
</html>