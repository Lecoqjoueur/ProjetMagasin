<?php include ('lib/php/verifier_connexion.php'); ?>

    <h2>Editer / ajouter un produit</h2>
<?php
$produit = new ProduitBD($cnx);
if(isset($_GET['editer_ajouter'])){
    extract($_GET,EXTR_OVERWRITE);
    if($_GET['action']=="editer"){
        ?><pre><?php     //var_dump($_GET);     ?></pre><?php
        if(!empty($reference) && !empty($nom) && !empty($description) && !empty($prix) && !empty($categorie) ){
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            if(empty($image)) {
                $produit->mise_a_jourProduit($id_produit, $nom, $prix, $description, $categorie, $reference);
            }
            else{
                $produit->mise_a_jourProduit2($id_produit, $nom, $prix, $description, $categorie,$image, $reference);
            }
            ?>
            <p style="color:green; font-weight:bold;">Modification effectué</p>
            <?php
        }
    } else if($_GET['action'] == "inserer") {
        ?><pre><?php     //var_dump($_GET);     ?></pre><?php



        if(!empty($reference) && !empty($nom) && !empty($description) && !empty($prix) && !empty($categorie) ){
            //print "ici";
            //3 instructions artificielles (devraient arriver d'un formulaire plus complet) :
            if(empty($image)) {
                $image = 'placeholder.png';
            }
            $retour=$produit->ajout_produit($nom,$categorie,$description,$prix,$image,$reference);
            ?>
            <p style="color:green; font-weight:bold;">Ajout effectué</p>
            <?php
        }
    }

}
?>

<form class="row g-3" method="get" action="<?php print $_SERVER['PHP_SELF'];?>" id="formEditAjout" enctype="multipart/form-data">
    <div class="col-md-2">
        <label for="reference" class="form-label">Référence</label>
        <input type="text" class="form-control" id="reference" name="reference">
    </div>
    <div class="col-md-6">
        <label for="denomination" class="form-label">Dénomination</label>
        <input type="text" class="form-control" id="denomination" name="nom">
    </div>
    <div class="col-md-11">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="col-md-2">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix">
    </div>
    <div class="col-md-2">
        <label for="categorie" class="form-label">Catégorie</label>
        <!--<input type="text" class="form-control" id="categorie"  name="categorie">
        <label for="categorie" class="form-label">Catégorie</label>
        <input type="text" class="form-control" id="categorie">-->
        <select name="categorie" class="form-control" id="categorie">
            <option>Choisissez une catégorie</option>
            <option value="pc">Ordinateur</option>
            <option value="smartphone">Smartphone</option>
            <option value="console">Console</option>
        </select>
    </div>
    <div class="col-12">
        <input type="hidden" name="id_produit" id="id_produit">
        <input type="hidden" name="action" id="action" >
        <button type="submit" class="btn btn-primary" id="editer_ajouter" name="editer_ajouter">Nouveau ou mettre à jour</button>
    </div>
    <div>
        <label for="image" class="form-label">Image :</label>
        <input type="file" class="form-control-file" name="image" id="image">
    </div>
</form>

