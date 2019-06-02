<?php
ini_set('display_errors',1);
session_start();
require_once('i18n/Language.php');
Lang::initLang($_SESSION["lang"]);

if(!isset($_SESSION['id']) || $_SESSION["type"] != 1){
  echo "NOK";
  die;
}

include("config.php");


$request = $bdd->prepare("SELECT USERS.nom, USERS.prenom, SECTEUR.name, GROUP_PRODUCTS.date_submit, GROUP_PRODUCTS.id FROM GROUP_PRODUCTS
	INNER JOIN USERS ON GROUP_PRODUCTS.fk_users = USERS.id
	INNER JOIN SECTEUR_TECHNICIEN ON USERS.fk_secteur = SECTEUR_TECHNICIEN.fk_secteur
	INNER JOIN SECTEUR ON SECTEUR.id = USERS.fk_secteur
	INNER JOIN TECHNICIEN ON TECHNICIEN.id = SECTEUR_TECHNICIEN.fk_technicien
	WHERE SECTEUR_TECHNICIEN.fk_technicien = :id AND GROUP_PRODUCTS.is_valid = '1'");
$answer = $request->execute(array("id"=>$_SESSION['id']));
$data = $request->fetchAll();

?>
<?php if(count($data) > 0 ) { ?>
<table class='table'>
  <caption class='text-center'><?php Lang::i18n("collectsuggest"); ?></caption>
  <tr>
    <th><?php Lang::i18n("name"); ?></th>
    <th><?php Lang::i18n("firstname"); ?></th>
    <th><?php Lang::i18n("sector"); ?></th>
    <th><?php Lang::i18n("submitdate"); ?></th>
    <th><?php Lang::i18n("manager"); ?></th>
  </tr>
  <?php 
    
    foreach ($data as $line) {
      
      echo "<tr>";
      echo "<td>".$line['nom']."</td>
      <td>" . $line['prenom'] . "</td>
      <td>" . $line['name']."</td>
      <td>" . $line['date_submit']."</td>
      <td> <button class='btn btn-info' onclick='loadProduct(" . $line['id'] . ");'>";
        Lang::i18n("seeproductlist");
      echo "</button> <button class='btn btn-primary' onclick='ramassageShow(" . $line['id'] . ");'>";
        Lang::i18n("takeit");
      echo "</button> </td>";
    echo "</tr>";
    }
  ?>
  
</table>
<?php }else{
      echo "<p>";
      Lang::i18n("noresultproduct");
      echo "</p>";
    }?>