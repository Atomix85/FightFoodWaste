<!DOCTYPE html>
<html>
<?php
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 1){
  header('Location: index.php');
}
include("header.php");

include("config.php");


?>
<head>
    <title>Espace personnel - PARTICULIER</title>
</head>

    </div><!--/#home-slider-->
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
            <li class="scroll"><a href="index.php">Home</a></li>
            <li class="scroll active"><a href="#">Mon espace</a></li>
            <li class="scroll"><a href="deconnect.php">Se déconnecter</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <br><br>

    <div id="secteurs">Loading...</div>
    <div id="listSuggestion">Loading...</div>

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

    <!-- Modal gestion prise en charge -->
    <div id="ramassage" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 1.0 !important">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Récapitulatif de ramassage</h4>
          </div>
          <div class="modal-body">
            <input id="ramassage_grp_product" type="hidden" value="">
            <div class="form-group">
              <label for="ramassage_date" class="form-label">Date du ramassage</label>
              <input id="ramassage_date" type="date" class="form-control"/>
            </div>
            <div class="form-group">
              <label for="ramassage_text" class="form-label">Laisser un message au particulier :</label>
              <textarea rows="4" cols="50" id="ramassage_text" class="form-control"></textarea>
            </div>
            <button class="btn btn-primary" onclick="ramassageSubmit()">Valider</button>
          </div>
        </div>
      </div>
    </div>

      <!-- Modal Ajout Secteur -->
    <div id="AddSecteur" class="modal fade" role="dialog" aria-hidden="true" tabindex="-1" style="opacity: 1.0 !important">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ajouter un secteur</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="search_secteur" class="form-label">Secteur :</label>
              <input type="text" id="search_secteur" name="search_secteur" class="form-control"/>
              <button name="seachSecteurBt" onclick="searchMatchSecteur('search_secteur');" class="btn btn-primary" id="seachSecteurBt">Rechercher</button>
            </div>
            <div id="secteurList"></div>
          </div>
        </div>
      </div>
    </div>

    <script>

      $( document ).ready(function() {
        loadSuggestion();
      });

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

      //SECTEUR
      function searchMatchSecteur(obj){

        var secteurList = document.getElementById("secteurList");

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer != "NOK"){
              secteurList.innerHTML = answer;
            }
          }
        }
        request.open('GET', "RefSearchSecteur.php?match="+document.getElementById(obj).value);
        request.send();

      }
      function addSecteur(id){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer != "NOK"){
              $('#AddSecteur').modal('hide');
              //searchMatchSecteur("search_secteur");
              loadSuggestion();
            }
          }
        }
        request.open('GET', "add_secteur.php?id="+id);
        request.send();

      }
      function supSecteur(id){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer != "NOK"){
              loadSuggestion();
            }
          }
        }
        request.open('GET', "sup_secteur.php?id="+id);
        request.send();

      }
      function loadSecteur(id){
        $('#AddSecteur').modal('show');
      }
      //RAMASSAGE
      function ramassageShow(id){
        $('#ramassage').modal('show');
        var ramassage_grp_product = document.getElementById("ramassage_grp_product");
        ramassage_grp_product.value = id;
      }
      function ramassageSubmit(){
        var ramassage_grp_product = document.getElementById("ramassage_grp_product").value;
        var ramassage_date = document.getElementById("ramassage_date").value;
        var ramassage_text = document.getElementById("ramassage_text").value;


        var params = "grp="+ramassage_grp_product+"&date="+ramassage_date+"&msg="+ramassage_text;
        var request = new XMLHttpRequest();
        request.open('POST', "ramassage_submit.php",true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer != "NOK"){
              $('#ramassage').modal('hide');
              loadSuggestion();
            }
          }
        }
        request.send(params);
      }
       
      function loadSuggestion(){
        var secteursManager  = document.getElementById("secteurs");
        var objList = document.getElementById("listSuggestion");

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            var answer = request.responseText;
            if(answer != "NOK"){
              objList.innerHTML = answer;
            }
          }
        }
        request.open('GET', "collect_suggestion.php");
        request.send();

        var request2 = new XMLHttpRequest();
        request2.onreadystatechange = function(){
          if(request2.readyState == 4 && request2.status == 200){
            var answer = request2.responseText;
            if(answer != "NOK"){
              secteursManager.innerHTML = answer;
            }
          }
        }
        request2.open('GET', "list_secteur.php");
        request2.send();

      }

    </script>

</body>
</html>
    