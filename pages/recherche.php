<h2>Recherche d'un produit</h2>
<?php
$prod = new ProduitBD($cnx);
$liste = $prod->getAllProduit();
$nbr= count($liste);
//var_dump($liste);
?>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="id">Identifiant : </label>
    <input type="text" id="id" name="id">&nbsp;
    <input type="submit" name="submit_id" value="Chercher" id="submit_id">
    <select name="choix_produit" id="choix_produit">
        <option value="">Choisissez</option>
        <?php
        for($i=0;$i<$nbr;$i++){
            ?>
            <option value="<?php print $liste[$i]->id_prod;?>">
                <?php print $liste[$i]->nom;?>
            </option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="submit_id" value="Chercher" id="submit_id">

</form>
<div class="card-group" id="infoProduit">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div id="id_prod"></div>
        </div>
    </div>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <div id="photo"></div>
        </div>
    </div>
</div>
