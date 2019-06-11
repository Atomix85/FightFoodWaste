<?php

session_start();
if(!isset($_SESSION['id']) || $_SESSION["type"] != 1){
  echo "FORBIDDEN";
  die;
}
if(!isset($_GET["collect"])){
    echo "BAD REQUEST";
    die;
}

include("config.php");
include("fpdf/fpdf.php");

$request = $bdd->prepare("SELECT * FROM TECHNICIEN
INNER JOIN COLLECT ON COLLECT.fk_technicien = TECHNICIEN.id
WHERE COLLECT.fk_grp_products=:collect");
$request->execute(array(":collect"=>$_GET["collect"]));

$TECHNICIEN = $request->fetch();

$PDF = new FPDF();
$PDF->AddPage();

$PDF->Image("./images/logo.png", 0, 0,50);

$PDF->SetFont("Helvetica","",12);
$PDF->SetTextColor(0, 105, 180);
$PDF->Text(10,50,"Nous contacter");
$PDF->Text(20,90,"Liste des produits :");

$PDF->SetFont("Helvetica","",20);
$PDF->Text(70,20,"Recapitulatif de collecte");

$PDF->SetTextColor(0, 0, 0);
$PDF->SetFont("Helvetica","",10);
$PDF->Text(10,55,"Mail : info@ffw.org");
$PDF->Text(130,50,$TECHNICIEN['name'] . " ".$TECHNICIEN['fname']);
$PDF->Text(130,55,$TECHNICIEN['nb_addr'] . " ".$TECHNICIEN['voie_addr']);
$PDF->Text(130,60,$TECHNICIEN['cp']);
$PDF->Text(130,65,$TECHNICIEN['pays']);
$PDF->Text(130,80,"Le ". date("d/m/Y",strtotime($TECHNICIEN['date_ramassage'])));


$request2 = $bdd->prepare("SELECT * FROM COLLECT
INNER JOIN PRODUCTS ON PRODUCTS.fk_group_product = COLLECT.fk_grp_products
WHERE COLLECT.fk_grp_products = :grp");
$request2->execute(array(":grp"=>$_GET["collect"]));

$PRODUCTS = $request2->fetchAll();
$i = 0;
$n = 1;
foreach($PRODUCTS as $product){
    if($product["quantity_unit"] == '0'){
        $quantity_unit = "";
    }else if($product["quantity_unit"] == '1'){
        $quantity_unit = "Kg";
    }else if($product["quantity_unit"] == '2'){
        $quantity_unit = "L";
    }
    
    $PDF->Text(20,100+$i,"Produit ".$n. " - " . $product['quantity']/100 . " ". $quantity_unit . " x " . $product["name"] . "");
    $i+=5;
    $n++;
}

$PDF->Output();
  

?>