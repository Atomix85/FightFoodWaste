<?php

   include("config.php");

    $name = $_POST['name'];
    $frist_name =$_POST['fristname'];
    $birthday =$_POST['birthday'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $tel =$_POST['tel'];
    $number_adress_volunteer =$_POST['number_adress_volunteer'];
    $adress_volunteer =$_POST['adress_volunteer'];
    $country =$_POST['country'];
    $postal_code =$_POST['postal_code'];
    
    $prerequest=$bdd->prepare("SELECT id FROM SECTEUR WHERE cp = :cp");
    $prerequest->execute(array(
    ":cp"=>$postal_code
    ));
    
    $secteur = $prerequest->fetch();
    if(!isset($secteur["id"])){
      header('Location: inscription_particulier.php?err=2');
    }else{

      $request = $bdd->prepare("INSERT INTO USERS (nom,prenom,mail,password,tel,birthday,nb_addr,voie_addr,cp,pays,grade,fk_secteur) VALUES (:nom, :prenom, :mail, :psw, :tel, :birthday, :nb_addr,:voie_addr,:cp,:pays,:grade,:secteur)");
      $data = $request->execute(array(
        ":nom"=>$name,
        ":prenom"=>$frist_name,
        ":mail"=>$email,
        ":psw"=>crypt($password,"-FFW_75~#"),
        ":tel"=>$tel,
        ":birthday"=>$birthday,
        ":nb_addr"=>$number_adress_volunteer,
        ":voie_addr"=>$adress_volunteer,
        ":cp"=>$postal_code,
        ":pays"=>$country,
        ":grade"=>'0',
        ":secteur"=>$secteur["id"]
      ));
      if(!$data){
        header('Location: inscription_particulier.php?err=1');
      }
  }

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
            <li class="scroll active"><a href="index.php">Home</a></li>
            <li class="scroll"><a href="index.php#services">Services</a></li> 
            <li class="scroll"><a href="index.php#about-us">About Us</a></li>                     
            <li class="scroll"><a href="index.php#portfolio">Portfolio</a></li>
            <li class="scroll"><a href="index.php#team">Team</a></li>
            <li class="scroll"><a href="inscription.php">S'inscrire</a></li>
            <li class="scroll"><a href="index.php#contact">Contact</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
    <?php 
      if($data){
        echo "Votre demande d'inscrition en tant que particulier a été soumise !";
      }
    ?>
</body>
</html>


