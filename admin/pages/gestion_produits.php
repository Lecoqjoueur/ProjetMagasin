<?php
include ('./lib/php/verifier_connexion.php');
$prod =new ProduitBD($cnx);
$liste=$prod->getAllProduit();
//var_dump($liste);
$nbr=count($liste);

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
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
            <td>
                <span contenteditable="true" name="nom" id="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->nom;?>
                </span>
            </td>
            <td>
                <th scope="row">
                <?php print $liste[$i]->categorie;?>
                </th>
            </td>
            <td>
                <span contenteditable="true" name="description" id="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->description;?>
                 </span>
            </td>
            <td>
                <span contenteditable="true" name="prix" id="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->prix;?> €
                 </span>
            </td>

        </tr>
  <?php
  }
  ?>
  </tbody>
</table>
