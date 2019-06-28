<?php
session_start();
require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);
if(!isset($_SESSION['id']) || ($_SESSION["type"] != 0 && $_SESSION["type"] != 4) ){
  header('Location: index.php');
}
include("config.php");

$request1 = $bdd->prepare("SELECT * FROM MESSAGE WHERE is_valid = '1' AND category = '3' ORDER BY date_msg DESC");
$request1->execute();
$cook = $request1->fetchAll();

?>
<!DOCTYPE html>
<html>
<?php include("header.php");?>
<head>
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

    <?php if(count($cook) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Liste des messages envoyez rubrique <b>cuisine</b> </caption>
      <tr>
        <th>Date</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>Validation</th>
      </tr>
      <?php

        foreach ($cook as $line) {
          echo "<tr>";
          echo "<td>" . $line['date_msg'] . "</td>
          <td>" . $line['subject'] . "</td>
          <td>" .$line['message']. "</td>
          <td> <button class='btn btn-primary' onclick='valideteMsg(" . $line['id'] . ");'>Ajouter</button>
          </tr>";
        }
      ?> 
    </table>
    <?php }else{
      echo "<p> Pour le moment, il n'y a aucunes offres. </p>";
    }?>

</head>
<body>

   <section id="contact">
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2><?php Lang::i18n("servicesexchange"); ?></h2>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="treatment_car.php">
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="<?php Lang::i18n('subject'); ?>" required="required">
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="<?php Lang::i18n('entermsg'); ?>" required="required"></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit"><?php Lang::i18n("send"); ?></button>
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