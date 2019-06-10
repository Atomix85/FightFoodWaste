<!DOCTYPE html>
<html>
<?php
session_start();
require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);

if(!isset($_SESSION['id']) || $_SESSION["type"] != 0){
  header('Location: index.php');
}
include("header.php");

include("config.php");

$request = $bdd->prepare("SELECT * FROM GROUP_PRODUCTS WHERE fk_users = :fkuser ORDER BY date_submit DESC");
$request->execute(array("fkuser"=>$_SESSION["id"]));

$GRPPRODUCT = $request->fetchAll();

$request2 = $bdd->prepare("SELECT TECHNICIEN.name, TECHNICIEN.fname, COLLECT.date_ramassage, COLLECT.message, COLLECT.fk_technicien, COLLECT.fk_grp_products FROM COLLECT
  INNER JOIN GROUP_PRODUCTS ON GROUP_PRODUCTS.id = COLLECT.fk_grp_products
  INNER JOIN USERS ON USERS.id = GROUP_PRODUCTS.fk_users
  INNER JOIN TECHNICIEN ON TECHNICIEN.id = COLLECT.fk_technicien
  WHERE USERS.id = :id AND COLLECT.is_confirmed = '0' ORDER BY COLLECT.date_ramassage ASC");
$request2->execute(array(":id"=>$_SESSION["id"]));

$NOTIFS = $request2->fetchAll();

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
            <li class="scroll"><a href="index.php"><?php Lang::i18n("home"); ?></a></li>
            <li class="scroll active"><a href="#"><?php Lang::i18n("myspace"); ?></a></li>
            <li class="scroll"><a href="edit_user.php"><span class="glyphicon glyphicon-cog"></a></span></li>
            <li class="scroll"><a href="deconnect.php"><?php Lang::i18n("deconnect"); ?></a></li>      
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <h2><?php Lang::i18n("notif"); ?></h2>
    <div>
     <?php if(count($NOTIFS) > 0){ ?>
          <?php 
             foreach ($NOTIFS as $line) {
              echo "<div class='form-group' style='background-color: lightgoldenrodyellow;'>".
              "<h4>".$line["name"]." ".$line["fname"];
                Lang::i18n("_cantakeproducts");
              echo $line["date_ramassage"]; 
                Lang::i18n("_confirm");
              echo "<button class='btn btn-primary' onclick='confirmCollect(".$line["fk_grp_products"].",".$line["fk_technicien"].")'>";
                Lang::i18n("yes");
              echo "</button><button class='btn btn-danger' onclick='supGrpProduct(".$line["fk_grp_products"].")'>";
                Lang::i18n("no");
              echo "</button></h4>".
              "<p>".$line["message"]."</p>"
              ."</div>";
            }
          ?>
        <?php }else{
          echo "<p>Aucune nouvelle notification ;)</p>";
        }?>
      </div>

    <h2><?php Lang::i18n("mylastproducts"); ?></h2>
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
            $rm = "<button class='btn btn-danger' onclick='supGrpProduct(" . $line['id'] . ");'>".
            Lang::valueof("remove")."</button>";
            $isValid = "<div>". Lang::valueof("waitingtechnician") ."</div>"; 
          }
          else if($line['is_valid'] == '2'){
            $isValid = "<div class='glyphicon glyphicon-ok'></div>"; 
            $rm = "";
          }else{
            $isValid = "<div class='glyphicon glyphicon-remove'></div>"; 
            $rm = "<button class='btn btn-danger' onclick='supGrpProduct(" . $line['id'] . ");'>".Lang::valueof("remove")."</button>";
          }
          echo "<tr>";
          echo "<td>".$line['date_submit']."</td>
          <td>" . $isValid . "</td>
          <td> <button class='btn btn-primary' onclick='loadProduct(" . $line['id'] . ");'>".Lang::valueof("operate")."</button> ".$rm." </td>
          </tr>";
        echo "</tr>";
        }
      ?>
      
    </table>
    <?php }else{
      echo "<p>".Lang::valueof("nosubmitproduct")."</p>";
    }?>
    <!-- Modal gestion produit -->
    <div id="productModal" class="modal fade in" style="overflow: scroll;" aria-hidden="true" id="modal-addr" >
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><?php Lang::i18n("listsubmitproduct"); ?></h4>
          </div>
          <div class="modal-body">
            <div id="PRODUCT_LIST">
             <?php Lang::valueof("noresultproduct"); ?>
            </div>
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
        request.open('GET', "gestion_grp_products.php?mode=rw&id="+idProduct);
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
              window.location.reload()
            }
          }
        }
        request.open('GET', "sup_grp_product.php?id="+grp);
        request.send();
      }

      function confirmCollect(grp, com){

        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
          if(request.readyState == 4 && request.status == 200){
            if(request.responseText == "OK"){
              window.location.reload()
            }
          }
        }
        request.open('GET', "confirm_collect.php?id="+grp);
        request.send();
        
      }

      

    </script>

</body>
</html>
    