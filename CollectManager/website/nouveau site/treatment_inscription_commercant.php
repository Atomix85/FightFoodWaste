<?php
 ini_set('display_errors',1);
   include("config.php");
   require_once('i18n/Language.php');
   session_start();
Lang::initLang($_SESSION["lang"]);

    $name = $_POST['name'];
    $frist_name =$_POST['fristname'];
    $name_business =$_POST['name_business'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $tel =$_POST['tel'];
    $number_adress_volunteer =$_POST['number_adress_business'];
    $adress_volunteer =$_POST['adress_business'];
    $country =$_POST['country'];
    $name_business=$_POST['name_business'];
    $postal_code =$_POST['postal_code'];
    

    $request = $bdd->prepare("INSERT INTO COMMERCANT (name,fname,mail,mdp,tel,nom_entreprise,numero,adress,cp,pays,validation) VALUES (:nom, :prenom, :mail, :psw, :tel, :entreprise, :nb_addr,:voie_addr,:cp,:pays,0)");
    $data = $request->execute(array(
      ":nom"=>$name,
      ":prenom"=>$frist_name,
      ":mail"=>$email,
      ":psw"=>crypt($password,"-FFW_75~#"),
      ":tel"=>$tel,
      ":entreprise"=>$name_business,
      ":nb_addr"=>$number_adress_volunteer,
      ":voie_addr"=>$adress_volunteer,
      ":cp"=>$postal_code,
      ":pays"=>$country
    ));

?>
<!DOCTYPE html>
<html>
<head>
  <?php    include("header.php");?>
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
            <li class="scroll"><a href="index.php"><?php Lang::i18n("home"); ?></a></li>
            <li class="scroll"><a href="index.php#services"><?php Lang::i18n("services"); ?></a></li>
            <li class="scroll"><a href="connexion.php"><?php Lang::i18n("loggin");?></a></li>
            <li class="scroll active"><a href="inscription.php"><?php Lang::i18n("register"); ?></a></li>
            <?php include("i18n/selectLang.php");?>        
          </ul>
        </div>
      </div>
    </div>
    <?php 
      if($data){
        echo "Votre demande d'inscrition en tant que commercant a été soumise !";
      }
      else{
        header('Location: inscription_commercant.php?err=1');
      }
    ?>

</body>
</html>


