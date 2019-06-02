<?php
session_start();
if(!isset($_SESSION['id'])){
  echo "NOK";
  die;
}

include("config.php");

$match = $_GET["match"];
if(!isset($match)){
  echo "NOK";
  die;
}
$match = "%".$match."%";

$request = $bdd->prepare("SELECT * FROM  SECTEUR WHERE  (name LIKE :match OR cp LIKE :match) LIMIT 0,10");
$answer = $request->execute(array("id"=>$_SESSION["id"],"match"=>$match));
$data = $request->fetchAll();

?>
<table class='table'>
<?php
foreach ($data as $line) {
	echo "<tr>".
	"<td>".$line["cp"]."</td>
	<td>".$line["name"]."</td>
	<td><button class='btn btn-primary' onclick='addSecteur(".$line["id"].");'>Ajouter</button></td></tr>";
}?>

</table>