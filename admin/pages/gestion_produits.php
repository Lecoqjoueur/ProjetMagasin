<?php
include ('./lib/php/verifier_connexion.php');
$prod =new ProduitBD($cnx);
$liste=$prod->getAllProduit();
$liste2=$prod->getAllProduit2();
//var_dump($liste);
$nbr=count($liste);
$nbr2=count($liste2);

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Reference</th>
      <th scope="col">Nom</th>
      <th scope="col">Catégorie</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>

    </tr>
  </thead>
  <tbody>
  <?php
  for($i=0;$i<$nbr;$i++){
      ?>
        <tr>
            <th scope="row">
                <?php print $liste[$i]->id_prod;?>
            </th>
            <td scope="row">
                <?php print $liste[$i]->reference;?>
            </td>
            <td>
                <span contenteditable="true" name="nom" id="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->nom;?>
                </span>
            </td>
            <td>
                <span contenteditable="false" name="categorie">
                <?php print $liste[$i]->categorie;?>
                </span>
            </td>
            <td>
                <span contenteditable="true" name="description" id="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->description;?>
                 </span>
            </td>
            <td>
                <span contenteditable="true" name="prix" id="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->prix;?>
                 </span>
                €
            </td>

        </tr>
  <?php
  }
  ?>
  </tbody>
</table>
<h4>Supprimer un produit : </h4>
<p id="rouge">!!!Les produits qui sont commandés ne sont pas affichés!!!</p>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
<select class="com1" name="id_prods" id="id_prods">
<option>Numéro de produit</option>
<?php
for($i=0;$i<$nbr2;$i++)
{
    ?><option value="<?php print $liste2[$i]->id_prod;?>"><?php
    print "produit numéro : ".$liste2[$i]->id_prod;
    ?></option>
    <?php
}
?>
</select>
    <input type="submit" name="submit_idp" value="Supprimer" id="submit_idp">
</form>
