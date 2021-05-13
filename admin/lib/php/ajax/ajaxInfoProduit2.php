<?php
header('Content-Type: application/json');
require '../pg_connect.php';
require '../classes/Connexion.class.php';
require '../classes/Produit.class.php';
require '../classes/ProduitBD.class.php';
$cnx = Connexion::getInstance($dsn,$user,$password);


//try catch ici
$pr = array();
$produit = new ProduitBD($cnx);
//On veut un tableau json --> pr[]
$pr[] = $produit->getProduitByNom($_GET['nom']);
//var_dump($pr);
print json_encode($pr);

