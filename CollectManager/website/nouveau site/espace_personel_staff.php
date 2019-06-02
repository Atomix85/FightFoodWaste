<!DOCTYPE html>
<html>
<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 2){
  header('Location: index.php');
}
include("header.php");

include("config.php");

$request = $bdd->prepare("SELECT * FROM GROUP_PRODUCTS WHERE is_valid = '0' ORDER BY date_submit DESC");
$request->execute();

$GRPPRODUCT = $request->fetchAll();

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
            <li class="scroll active"><a href="#">Gestion des produits</a></li>
            <li class="scroll"><a href="stock_gestion.php">Gestion des stocks</a></li>
            <li class="scroll"><a href="deconnect.php">Se déconnecter</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <section>
    <h2>Mes derniers produits</h2>
    <?php if(count($GRPPRODUCT) > 0){ ?>
    <table class='table'>
      <caption class='text-center'>Historique des produits publiés </caption>
      <tr>
        <th>Date de soumission</th>
        <th>Validé ?</th>
        <th>Gestion</th>
      </tr>
      <?php

        foreach ($GRPPRODUCT as $line) {
          if($line['is_valid'] == '1'){
            $isValid = "<div class='glyphicon glyphicon-ok'></div>"; 
          }else{
            $isValid = "<div class='glyphicon glyphicon-remove'></div>"; 
          }
          echo "<tr>";
          echo "<td>".$line['date_submit']."</td>
          <td>" . $isValid . "</td>
          <td> <button class='btn btn-info' onclick='loadProduct(" . $line['id'] . ");'>Gérer</button> <button class='btn btn-success' onclick='valGrpProduct(" . $line['id'] . ");'>Validation</button> <button class='btn btn-danger' onclick='supGrpProduct(" . $line['id'] . ");'>Rejeter</button> </td>
          </tr>";
        echo "</tr>";
        }
      ?>
      
    </table>
    <?php }else{
      echo "<p>Malheuresement, aucun produit n'a été soumis :/</p>";
    }?>
  </section>
  <section>
    <h2>Gérer les produits</h2>
    <div class="form-group">
      <input type="number" placeholder="Entrepot" id="entrepot" onblur="searchStockProduct()"/>
      <input type="number" placeholder="Secteur" id="secteur" onblur="searchStockProduct()"/>
      <input type="number" placeholder="Couloir" id="couloir" onblur="searchStockProduct()"/>
      <input type="number" placeholder="Bloc" id="bloc" onblur="searchStockProduct()"/>

    </div>
    <div class="responsive-table" id="SUGGESTIONSTOCKPRODUCT">
    </div>
  </section>
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
        request.open('GET', "gestion_grp_products.php?mode=ro&id="+idProduct);
        request.send();

      }
      function supProduct(grp,idProduct){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            if(request.responseText == "OK"){

            }
          }
        }
        request.open('GET', "sup_product.php?id="+idProduct);
        request.send();

        loadProduct(grp);

      }
      function supGrpProduct(grp){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            if(request.responseText == "OK"){

            }
          }
        }
        request.open('GET', "sup_grp_product.php?id="+grp);
        request.send();
        window.location.reload()
      }

      function valGrpProduct(grp){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          // 4 et 200 c'est qu'il a reussi a avoir une reponse du serveur et que c'est  bon
          if(request.readyState == 4 && request.status == 200){
            if(request.responseText == "OK"){

            }
          }
        }
        request.open('GET', "val_grp_product.php?id="+grp);
        request.send();
        window.location.reload()
      }

      function searchStockProduct(){
        var entrepot = document.getElementById("entrepot").value;
        var secteur = document.getElementById("secteur").value;
        var couloir = document.getElementById("couloir").value;
        var bloc = document.getElementById("bloc").value;
      
        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          // 4 et 200 c'est qu'il a reussi a avoir une reponse du serveur et que c'est  bon
          if(request.readyState == 4 && request.status == 200){
            var tableStockProduct=document.getElementById("SUGGESTIONSTOCKPRODUCT");
            tableStockProduct.innerHTML = request.responseText;
          }
        }
        request.open('GET', "SearchStockProduct.php?en="+entrepot+"&se="+secteur+"&co="+couloir+"&bl="+bloc);
        request.send();

        return true;
      }


    </script>

</body>
</html>
    