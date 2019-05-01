<?php
 
include("config.php");

                $file2 = fopen('fail.txt','w');
                $requete = $bdd->query("SELECT * FROM stock WHERE date_sortie_stock is not NULL ORDER BY date_de_peremption DESC");
                while($ligne=$requete->fetch()){
                              
                               $chaine = $ligne['name'].";" . $ligne['quantite'] . ";" . $ligne['date_de_peremption'] . ";" . $ligne['date_entre_stock'].";\r\n";
                              
                               fwrite($file2,$chaine);
                }
               
                fclose($file2);
               
               
require('fpdf/fpdf.php');
class PDF extends FPDF
{
                function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}
 
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',20,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(90,10,'Historique des stocks indisponible',1,0,'C');
    // Line break
    $this->Ln(40);
}
 
// Page footer numero des pages
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
 
// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(23,155,48);
    $this->SetTextColor(255);
    $this->SetDrawColor(0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(55,25,55,45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'L',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
 
}
 
// Instanciation of inherited class
$pdf = new PDF();
$header = array('name', 'quantite', 'date_de_peremption', 'date_entre_stock');
$data = $pdf->LoadData('fail.txt');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->SetFont('Times','',12);
 
$pdf->Output('historique_des_stocks_indisponible.pdf','D');
?>
