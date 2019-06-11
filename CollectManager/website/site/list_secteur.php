<div class="row">
	<div class="col-sm-1"></div>
<div style="border: 1px solid blue;padding: 5px;border-radius: 10px;" class="col-sm-9">
<?php

include("config.php");
session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 1){
  echo "NOK";
  die;
}

$request = $bdd->prepare("SELECT SECTEUR_TECHNICIEN.fk_secteur, SECTEUR.name FROM SECTEUR_TECHNICIEN
	INNER JOIN SECTEUR ON SECTEUR_TECHNICIEN.fk_secteur = SECTEUR.id
	WHERE SECTEUR_TECHNICIEN.fk_technicien = :id");
$answer = $request->execute(array("id"=>$_SESSION["id"]));
$data = $request->fetchAll();

foreach ($data as $line) {
	echo "<span class='label label-primary' style='margin:5px;font-size:100%;'>".$line["name"]."<button onclick='supSecteur(".$line["fk_secteur"].");' style='
    background: rgba(0,0,0,0);border: rgba(0,0,0,0);'>x</button></span>";
}

?>
</div>
<div class="col-sm-2">
<button type="button" class="btn btn-primary glyphicon glyphicon-plus" onclick="loadSecteur();" ></button>
</div>
</div>