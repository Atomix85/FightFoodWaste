<?php 
ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 1){
  header('Location: index.php');
}
include("config.php");
if(!isset($_GET["date"])){
  $_GET["date"] = date("Y-m-d");
}
$request = $bdd->prepare("SELECT USERS.nom,USERS.prenom,USERS.tel, USERS.nb_addr, USERS.voie_addr, COLLECT.fk_grp_products,COLLECT.is_confirmed FROM COLLECT
  INNER JOIN GROUP_PRODUCTS ON GROUP_PRODUCTS.id = COLLECT.fk_grp_products
  INNER JOIN USERS ON USERS.id = GROUP_PRODUCTS.fk_users
  WHERE COLLECT.date_ramassage = :_date AND COLLECT.is_confirmed IN ('1','2','3')");
$request->execute(array(":_date"=>$_GET["date"]));
$data = $request->fetchAll();
?>

<!DOCTYPE html>
<html>
<?php
include("header.php");
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
            <li class="scroll"><a href="espace_personel_technicien.php">Suggestion des collectes</a></li>
            <li class="scroll active"><a href="#">Récapitulatif des tournées</a></li>
            <li class="scroll"><a href="deconnect.php">Se déconnecter</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->

  <body>
    <br><br>
    <form method="GET" action="#">
      <center>
        <input placeholder="Date" type="date" name="date" value="<?php echo $_GET["date"]; ?>"/>
        <input type="submit" class="btn btn-primary" name="ok">
      </center>
    </form>
    <div id="listSuggestion">
    <?php if(count($data) > 0){ ?>
    <table class='table'>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Adresse</th>
        <th>Gestion</th>
      </tr>
      <?php 

         foreach ($data as $line) {
           if($line["is_confirmed"] == 1){
            $buttonManaged = "<button class='btn btn-danger' onclick='markAsManaged(". $line["fk_grp_products"].");'>Produit récupérer ?</button>";
           }else{
             $buttonManaged = "<button class='btn btn-danger' onclick='window.open(\"generate_recap_pdf.php?collect=". $line["fk_grp_products"]."\", \"_blank\");'>Télécharger le PDF</button>";
           }
           
          echo "<tr>";
          echo "<td>".$line['nom']."</td>".
          "<td>".$line['prenom']."</td>".
          "<td>".$line['tel']."</td>".
          "<td>".$line['nb_addr']." ". $line['voie_addr']."</td>".
          "<td><button class='btn btn-primary' onclick='loadProduct(". $line["fk_grp_products"].");'>Voir les produits</button>
          $buttonManaged</td>".
          "</tr>";
        
          }
          echo "</table>";

        }else{
            echo "<center><p>Rien de prévu pour ce jour</p></center>";
          }
      ?></div>
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
    