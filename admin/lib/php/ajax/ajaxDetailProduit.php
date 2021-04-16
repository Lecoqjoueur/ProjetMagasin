<?php
header('Content-Type: application/json');
/*
 * inclure les fichiers necessaires a la communication avec la BD car on ne passe pas par l'index
 * Ce fichier est appelé par fonctions_jquery.js
 */
//a partir de admin/lib/php/ajax, revenir dans admin
include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Produit.class.php');
include ('../classes/ProduitBD.class.php');

$cnx = Connexion::getInstance($dsn,$user,$password);

$pr = array();
$prod = new ProduitBD($cnx);
$pr[] = $prod->getProduitById($_GET['id_produit']);
print json_encode($pr);
