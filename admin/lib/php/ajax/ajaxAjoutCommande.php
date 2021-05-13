<?php
header('Content-Type: application/json');
/*
 * inclure les fichiers nécessaire à la communication avec la BD car on ne passe par l'index
 * Ce fichier est appelé par fonctions_jquery.js
 */
//A partir de admin/lib/php/ajax, revenir dans dossier précédent
include ('../pg_connect.php');
include ('../classes/Connexion.class.php');
include ('../classes/Commande.class.php');
include ('../classes/CommandeBD.class.php');
$cnx = Connexion::getInstance($dsn,$user,$password);
$pr = array();
$produit = new CommandeBD($cnx);
//id_produit est un paramètre de l'url
//ds js : var parametre = "id_produit="+id;
$pr[] = $produit->ajout_commande($_GET['id_prod'],$_GET['qte'],$_GET['id_client']);
//conversion du tableau PHP au format javascript
print json_encode($pr);