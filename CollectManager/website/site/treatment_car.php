<?php
session_start();
$conn = isset($_SESSION["id"]);
include("header.php");
include("config.php");
ini_set('display_errors',1);


    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $year_date = date("Y");
    $mounth_date = date("m");
    $day_date = date("j");
    $date_msg = $year_date . "-" . $mounth_date . "-" . $day_date;
    

    $request = $bdd->prepare("INSERT INTO MESSAGE (subject,message,date_msg,id_user,category,is_valid) VALUES (:subject, :message, :date_msg,:id_user,:category,:is_valid)");
    $data = $request->execute(array(
      ":subject"=>$subject,
      ":message"=>$message,
      ":date_msg"=>$date_msg,
      ":id_user"=>$_SESSION["id"],
      ":category"=>2,
      ":is_valid"=>0,
    ));

?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
    <?php 
      if($data){
        echo "Votre message a bien été transmis !";
      }
      else{
        header('Location: inscription_technicien.php?err=1');
      }
    ?>

</body>
</html>


