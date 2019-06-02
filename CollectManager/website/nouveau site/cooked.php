<?php
session_start();
$conn = isset($_SESSION["id"]);

include("header.php");
include("config.php");

$request1 = $bdd->prepare("SELECT * FROM MESSAGE WHERE is_valid = '1' AND category = '1'ORDER BY date_msg DESC");
$request1->execute();
$cook = $request1->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <link href="css/css.css" rel="stylesheet">
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

  <!-- Tab panes -->
<div class="kimia2 card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header">Header</div>
  <div class="card-body text-dark">
    <h5 class="card-title">Dark card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>

    <?php if(count($cook) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Liste des messages envoyez rubrique <b>cuisine</b> </caption>
      <tr>
        <th>Nom</th>
        <th>Date</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>Validation</th>
      </tr>
      <?php

        foreach ($cook as $line) {
          echo "<tr>";
          echo "<td>".$line['id_user']."</td>
          <td>" . $line['date_msg'] . "</td>
          <td>" . $line['subject'] . "</td>
          <td>" .$line['message']. "</td>
          <td> <button class='btn btn-primary' onclick='valideteMsg(" . $line['id'] . ");'>Valider</button><button class='btn btn-info' onclick='supMsg(" . $line['id'] . ");'>Supprimer</button></td>
          </tr>";
        }
      ?> 
    </table>
    <?php }else{
      echo "<p> Pour le moment, il n'y a aucunes offres. </p>";
    }?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>


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
              <form id="main-contact-form" name="contact-form" method="post" action="treatment_cooked.php">
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