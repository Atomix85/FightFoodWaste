<!DOCTYPE html>
<html>
<?php
session_start();

require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);

if(!isset($_SESSION['id']) || $_SESSION["type"] != 2){
  header('Location: index.php');
}
include("header.php");

include("config.php");

$request = $bdd->prepare("SELECT * FROM GROUP_PRODUCTS WHERE is_valid = '0' ORDER BY date_submit DESC");
$request->execute();

$GRPPRODUCT = $request->fetchAll();

?>
  <header>
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
            <li class="scroll"><a href="management_msg.php"><?php Lang::i18n("msgmanager"); ?></a></li>
            <li class="scroll active"><a href="#"><?php Lang::i18n("productsmanager"); ?></a></li>
            <li class="scroll"><a href="stock_gestion.php"><?php Lang::i18n("stocksmanager"); ?></a></li>
            <li class="scroll"><a href="deconnect.php"><?php Lang::i18n("deconnect"); ?></a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <section>
    <h2><?php Lang::i18n("lastproducts"); ?></h2>
    <?php if(count($GRPPRODUCT) > 0){ ?>
    <table class='table'>
      <tr>
        <th><?php Lang::i18n("submitdate"); ?></th>
        <th><?php Lang::i18n("isvalided"); ?></th>
        <th><?php Lang::i18n("manager"); ?></th>
      </tr>
      <?php

        foreach ($GRPPRODUCT as $line) {
          if($line['is_valid'] == '1'){
            $isValid = "<div class='glyphicon glyphicon-ok'></div>"; 
          }else{
            $isValid = "<div class='glyphicon glyphicon-remove'></div>"; 
          }
          echo "<tr><td>".$line['date_submit']."</td>
          <td>" . $isValid . "</td>
          <td><button class='btn btn-info' onclick='loadProduct(" . $line['id'] . ");'>".
            Lang::valueof("operate").
          "</button>
          <button class='btn btn-success' onclick='valGrpProduct(" . $line['id'] . ");'>".
            Lang::valueof("valid").
          "</button>
          <button class='btn btn-danger' onclick='supGrpProduct(" . $line['id'] . ");'>".
            Lang::valueof("rejet").
          "</button></td></tr>";
        }
      ?>
      
    </table>
    <?php }else{
      echo "<p>" . Lang::valueof("nosubmitproduct") . "</p>";
    }?>
  </section>
  <section>
    <h2><?php Lang::i18n("findproduct"); ?></h2>
    <div class="form-group">
      <input type="number" placeholder="<?php Lang::i18n("reposity"); ?>" id="entrepot" onblur="searchStockProduct()"/>
      <input type="number" placeholder="<?php Lang::i18n("hall"); ?>" id="secteur" onblur="searchStockProduct()"/>
      <input type="number" placeholder="<?php Lang::i18n("corridor"); ?>" id="couloir" onblur="searchStockProduct()"/>
      <input type="number" placeholder="<?php Lang::i18n("block"); ?>" id="bloc" onblur="searchStockProduct()"/>

    </div>
    <div class="responsive-table" id="SUGGESTIONSTOCKPRODUCT">
    </div>
  </section>
    <!-- Modal gestion produit -->
    <div id="productModal" class="modal fade in" style="overflow: scroll;" aria-hidden="true" id="modal-addr" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php Lang::i18n("listsubmitproduct"); ?></h4>
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
    