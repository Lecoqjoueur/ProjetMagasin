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
$pdf->SetTextColor(255,0,0);
$pdf->Cell(190,10,'Notre Assortiment',1,1,'C');
$pdf->SetFont('times','',12);
$pdf->SetTextColor(0,0,0);
$x =20;
$y=50;
for($i =0;$i<$nbr;$i++){
    $pdf->WriteHTMLCell(150,30,$x,$y,$liste[$i]->nom,1,1,'','','L');
    $y+=10;
}
$pdf->Output();
//$pdf->Output('catalogue.pdf','D');
