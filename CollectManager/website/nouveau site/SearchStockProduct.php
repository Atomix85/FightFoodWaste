<?php

 ini_set('display_errors',1);
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 2){
  header('Location: index.php');
}
$defaultAnswer = "<table class='table'>Aucun résultat trouvé</table>";

$en = $_GET["en"];
if(!isset($en)){
  die($defaultAnswer);
}

$se = $_GET["se"];
if(!isset($se)){
  die($defaultAnswer);
}

$co = $_GET["co"];
if(!isset($co)){
 	die($defaultAnswer);
}

$bl = $_GET["bl"];
if(!isset($bl)){
  die($defaultAnswer);
}

include("config.php");

$request = $bdd->prepare("SELECT st.entrepot, st.secteur, st.couloir, st.bloc, pr.idProduct, pr.name FROM STOCK st
	INNER JOIN PRODUCTS pr ON pr.id = st.fk_product
	 WHERE (entrepot=:en OR :en='') AND 
	(secteur=:se OR :se='') AND 
	(couloir=:co OR :co='') AND
	(bloc=:bl OR :bl='') LIMIT 0,20");
$request->execute(array(
	":en"=>$en,
	":se"=>$se,
	":co"=>$co,
	":bl"=>$bl));

$data = $request->fetchAll();

if(count($data) == 0) die($defaultAnswer);



echo "<table class='table'>";
echo "<tr>
    <th>Entrepot</th>
    <th>Secteur</th>
    <th>Couloir</th>
    <th>Bloc</th>
    <th>ID du produit</th>
    <th>Nom du produit</th>
  </tr>";
foreach ($data as $line) {
	echo "<tr><td>".$line["entrepot"]."</td>".
		"<td>".$line["secteur"]."</td>".
		"<td>".$line["couloir"]."</td>".
		"<td>".$line["bloc"]."</td>".
		"<td>".$line["idProduct"]."</td>".
		"<td>".$line["name"]."</td></tr>";
}
echo "</table>";

?>