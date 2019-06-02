<!DOCTYPE html>
<html>
<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 2){
  header('Location: index.php');
}
include("header.php");

include("config.php");

$request = $bdd->prepare("SELECT COLLECT.date_ramassage, TECHNICIEN.name, TECHNICIEN.fname, COLLECT.fk_grp_products FROM COLLECT
  INNER JOIN TECHNICIEN ON TECHNICIEN.id = COLLECT.fk_technicien
  WHERE is_confirmed = '1' AND date_ramassage <= NOW() ORDER BY date_ramassage ASC");
$request->execute();

$COLLECT = $request->fetchAll();

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
            <li class="scroll"><a href="management_msg.php">Gestion des messages</a></li>
            <li class="scroll"><a href="espace_personel_staff.php">Gestion des produits</a></li>
            <li class="scroll active"><a href="stock_gestion.php">Gestion des stocks</a></li>
            <li class="scroll"><a href="deconnect.php">Se déconnecter</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <h2>Stock à gérer</h2>
    <?php if(count($COLLECT) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Historique des stocks à gérer</caption>
      <tr>
        <th>Date de ramassage</th>
        <th>technicien</th>
        <th>Gestion</th>
      </tr>
      <?php

        foreach ($COLLECT as $line) {
          $name = $line["name"] . " " . $line["fname"];
          echo "<tr>";
          echo "<td>".$line['date_ramassage']."</td>
          <td>" . $name . "</td>
          <td> <button class='btn btn-primary' onclick='loadProduct(" . $line['fk_grp_products'] . ");'>Gérer</button><button class='btn btn-info' onclick='markAsManaged(" . $line['fk_grp_products'] . ");'>Marquer comme traité</button></td>
          </tr>";
        }
      ?>
      
    </table>
    <?php }else{
      echo "<p>Aucun stock à gérer</p>";
    }?>
    <!-- Modal gestion produit -->
    <div id="productModal" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 1.0 !important">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Liste des produits soumis</h4>
          </div>
          <div class="modal-body">
            <div id="PRODUCT_LIST"></div>
          </div>
        </div>

      </div>
    </div>

    <script>
      function loadProduct(idProduct){

        var objList = document.getElementById("PRODUCT_LIST");

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer != "NOK"){
              objList.innerHTML = answer;
              $('#productModal').modal('show');
            }
          }
        }
        request.open('GET', "gestion_grp_products.php?mode=manage&id="+idProduct);
        request.send();

      }
      //STOck
      function manageProduct(grp,idProduct){
        var objList = document.getElementById("PRODUCT_LIST");

        var request = new XMLHttpRequest();
            request.onreadystatechange = function(){
              if(request.readyState == 4 && request.status == 200){
                var answer = request.responseText;
                if(answer != "NOK"){
                  objList.innerHTML = answer;            }
              }
            }
            request.open('GET', "product_stock.php?id="+idProduct+"&grp="+grp);
            request.send();
      }
      function addProductStock(){
        var product = document.getElementById("product").value;
        var grp = document.getElementById("grp").value;
        var en = document.getElementById("entrepot").value;
        var se = document.getElementById("secteur").value;
        var co = document.getElementById("couloir").value;
        var bl = document.getElementById("bloc").value;
        var err = document.getElementById("err_stock");


        var params = "product="+product+"&entrepot="+en+"&secteur="+se+"&couloir="+co+"&bloc="+bl;
        var request = new XMLHttpRequest();
        request.open('POST', "add_product_stock.php",true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer == "OK"){
              loadProduct(grp);
            }
            else{
              err.innerHTML = answer;
            }
          }
        }
        request.send(params);
      }


      function markAsManaged(idProduct){
        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer != "NOK"){
              
        window.location.reload()
            }
          }
        }
        request.open('GET', "marked_as_managed.php?id="+idProduct);
        request.send();
      }

    </script>

</body>
</html>
    