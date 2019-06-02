<!DOCTYPE html>
<html>
<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 2){
  header('Location: index.php');
}
include("header.php");

include("config.php");

$request1 = $bdd->prepare("SELECT * FROM MESSAGE WHERE is_valid = '0' AND category = '1'ORDER BY date_msg DESC");
$request1->execute();
$cook = $request1->fetchAll();

$request2 = $bdd->prepare("SELECT * FROM MESSAGE WHERE is_valid = '0' AND category = '2'ORDER BY date_msg DESC");
$request2->execute();
$car = $request2->fetchAll();

$request3 = $bdd->prepare("SELECT * FROM MESSAGE WHERE is_valid = '0' AND category = '3'ORDER BY date_msg DESC");
$request3->execute();
$exchange_service = $request3->fetchAll();

$request4 = $bdd->prepare("SELECT * FROM MESSAGE WHERE is_valid = '0' AND category = '4'ORDER BY date_msg DESC");
$request4->execute();
$repair_service = $request4->fetchAll();

$request5 = $bdd->prepare("SELECT * FROM MESSAGE WHERE is_valid = '0' AND category = '5'ORDER BY date_msg DESC");
$request5->execute();
$caretaking = $request5->fetchAll();

?>
<head>
    <title> Espace personnel - STAFF </title>
</head>

    </div><!--/#home-slider-->
    <div class="main-nav" style="background: darkslateblue;">
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
          	<li class="scroll active"><a href="management_msg.php">Gestion des messages</a></li>
            <li class="scroll"><a href="espace_personel_staff.php">Gestion des produits</a></li>
            <li class="scroll"><a href="stock_gestion.php">Gestion des stocks</a></li>
            <li class="scroll"><a href="deconnect.php">Se déconnecter</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <h2>Gestion des messages</h2>

    <!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cuisine</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Voiture</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="messages-tab" data-toggle="tab" href="#messages" role="tab" aria-controls="messages" aria-selected="false">Echange de service</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="false">Aide & Conseil en réparation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="gardiennage-tab" data-toggle="tab" href="#gardiennage" role="tab" aria-controls="gardiennage" aria-selected="false">Gardiennage</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <?php if(count($cook) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Historique des messages envoyez rubrique <b>cuisine</b> </caption>
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
      echo "<p>Aucun message a validé dans la rubrique cuisine </p>";
    }?>
  
  </div>
  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  	<?php if(count($car) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Historique des messages envoyez rubrique <b>voiture</b> </caption>
      <tr>
        <th>Nom</th>
        <th>Date</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>Validation</th>
      </tr>
      <?php

        foreach ($car as $line) {
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
      echo "<p>Aucun message a validé dans la rubrique voiture </p>";
    }?>
  </div>
  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
  	<?php if(count($exchange_service) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Historique des messages envoyez rubrique <b>échange de service </b></caption>
      <tr>
        <th>Nom</th>
        <th>Date</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>Validation</th>
      </tr>
      <?php

        foreach ($exchange_service as $line) {
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
      echo "<p>Aucun message a validé dans la rubrique échange de service </p>";
    }?>
  </div>
  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
  	<?php if(count($repair_service) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Historique des messages envoyez rubrique <b>réparation </b></caption>
      <tr>
        <th>Nom</th>
        <th>Date</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>Validation</th>
      </tr>
      <?php

        foreach ($repair_service as $line) {
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
      echo "<p>Aucun message a validé dans la rubrique réparation </p>";
    }?>
  </div>
  <div class="tab-pane" id="gardiennage" role="tabpanel" aria-labelledby="gardiennage-tab">
  	<?php if(count($caretaking) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Historique des messages envoyez rubrique <h3>gardiennage </h3> </caption>
      <tr>
        <th>Nom</th>
        <th>Date</th>
        <th>Sujet</th>
        <th>Message</th>
        <th>Validation</th>
      </tr>
      <?php

        foreach ($caretaking as $line) {
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
      echo "<p>Aucun message a validé dans la rubrique gardiennage </p>";
    }?>
  </div>
</div>

    <script type="text/javascript" src="bootstrap.js"></script>
    <script type="text/javascript">

    	function valideteMsg(id){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            if(request.responseText == "OK"){
              window.location.reload()
            }
          }
        }
        request.open('GET', "val_msg.php?id="+id);
        request.send();
        window.location.reload()

      }
       function supMsg(id){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            if(request.responseText == "OK"){
              window.location.reload()
            }
          }
        }
        request.open('GET', "sup_msg.php?id="+id);
        request.send();

      }
    </script>

</body>
</html>
    