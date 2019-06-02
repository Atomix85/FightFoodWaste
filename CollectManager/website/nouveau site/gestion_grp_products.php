<?php
  session_start();
if(!isset($_SESSION['id'])){
  echo "NOK";
  die;
}
include("header.php");

include("config.php");

$idGrpProduct = $_GET["id"];
if(!isset($idGrpProduct)){
  echo "NOK";
  die;
}

$mode = $_GET["mode"];
if(!isset($mode)){
  echo "NOK";
  die;
}
//Securité
if($mode == "manage" && $_SESSION["type"] != 2){
  echo "NOK";
  die;
}

$request = $bdd->prepare("SELECT id, idProduct,name,quantity_unit, quantity FROM PRODUCTS WHERE fk_group_product = :fkgrp AND is_stocked = '0' ORDER BY name ASC");
$request->execute(array("fkgrp"=>$idGrpProduct));

$PRODUCT = $request->fetchAll();
?>
<table class='table'>
  <caption class='text-center'>Historique des produits publiés </caption>
  <tr>
    <th>Numéro du produit</th>
    <th>Nom</th>
    <th>Quantité</th>
    <?php 
    if($mode=="rw") echo "<th>Supprimer</th>" ;
    else if($mode=="manage") echo "<th>Gestion</th>";
      ?>
  </tr>
  <?php 
    $quantity_unit = "";
    
    foreach ($PRODUCT as $line) {
      if($line['quantity_unit'] === '1'){
        $quantity_unit = "Kg";
      } 
      else if($line['quantity_unit'] === '2'){
        $quantity_unit = "L";
      } 
      $button = "";
      if($mode=="rw") $button = "<td> <button class='btn btn-danger' onclick='supProduct(".$idGrpProduct."," . $line['id'] . ");'>Supprimer</button> </td>";
      else if($mode=="manage") $button = "<td> <button class='btn btn-info' onclick='manageProduct(".$idGrpProduct."," .$line['id'] . ");'>Stocker</button> </td>";
      echo "<tr>";
      echo "<td>".$line['idProduct']."</td>
      <td>" . $line['name'] . "</td>".
      "<td>" . $line['quantity']/100 . " ". $quantity_unit."</td>".
      $button.
      "</tr>";
    echo "</tr>";
    }
    
  ?>
  
</table>