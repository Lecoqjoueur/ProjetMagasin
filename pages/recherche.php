<h2>Recherche d'un produit</h2>

<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="id">Identifiant : </label>
    <input type="text" id="id" name="id">&nbsp;
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
