<?php
include ('../admin/lib/php/pg_connect.php');
include ('../admin/lib/php/classes/Connexion.class.php');
include ('../admin/lib/php/classes/Produit.class.php');
include ('../admin/lib/php/classes/ProduitBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);
$pr = array();
$produit = new ProduitBD($cnx);
$liste = $produit->getProduit();
$nbr=count($liste);

include ('../admin/lib/php/TCPDF/tcpdf.php');
$pdf = new TCPDF('P','mm','A4');

$pdf->AddPage();
$pdf->SetFont('times','B',15);
$pdf->SetTextColor(0,0,255);
$pdf->Cell(190,10,'Catalogue de TechnoShop',1,1,'C');
$pdf->SetFont('times','',12);
$pdf->SetTextColor(0,0,0);
$x =30;
$x2=90;
$y=40;
for($i =0;$i<$nbr;$i++){
    $pdf->WriteHTMLCell(110,0,$x,$y,$liste[$i]->nom,1,1,'','','L');
    $pdf->WriteHTMLCell(50,0,$x2,$y,$liste[$i]->prix,1,1,'','','L');

    $y+=10;
}
$pdf->Output();
//$pdf->Output('catalogue.pdf','D');
