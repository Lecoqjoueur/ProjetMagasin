<?php
include ('./lib/php/verifier_connexion.php');
?>

<h2>Ajouter un produit</h2>

<form class="row g-3">

    <div class="col-md-2">
        <label for="reference" class="form-label">Reference</label>
        <input type="email" class="form-control" id="reference">
    </div>
    <div class="col-md-6">
        <label for="nom" class="form-label">Nom du produit</label>
        <input type="text" class="form-control" id="nom">
    </div>
    <div class="col-md-3">
        <label for="categorie" class="form-label">Catégorie</label>
        <input type="text" class="form-control" id="categorie">
    </div>
    <div class="col-md-12">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description">
    </div>
    <div class="col-md-2">
        <label for="prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="prix">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary" id="editer" name="editer">Mettre à jour</button>
        <button type="submit" class="btn btn-primary" id="inserer">Enregistrer</button>
    </div>
    
</form>
