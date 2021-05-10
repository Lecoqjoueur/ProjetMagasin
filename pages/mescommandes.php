<?php
ini_set('display_errors','off');
$prod = new CommandeBD($cnx);

$liste =  $prod->getCommande();

$nbr =count($liste);
if($nbr==0){
    ?>

    <h3>Pas de commande en cours</h3>
    <?php
}
else{
?>

<h2>Mes commandes:</h2>


<br>
<table class="prod1" width="90%">
    <tr class="prod2">
        <td class="prod3">
            Numéro de commande
        </td>
        <td class="prod3">
            Produit commandé
        </td>
        <td class="prod3">
            Quantité
        </td>
        <td class="prod3">
            Prix total
        </td>

    </tr>

    <?php
    for($i=0;$i<$nbr;$i++){
        ?>

        <tr class="prod2">
            <td class="prod3">
                <?php
                print $liste[$i]->id_com;
                ?>
            </td>
            <td class="prod3">
                <?php
                print $liste[$i]->nom;
                ?>
            </td>
            <td class="prod3">
                <?php
                print $liste[$i]->quantité;
                ?>
            </td>
            <td class="prod3">
                <?php
                print ($liste[$i]->prix * $liste[$i]->quantité);
                ?>
                €
            </td>
            <!--<td>
                <div class="btn-group">
                    <a href="">Annuler</a>
                </div>
            </td>-->
        </tr>
        <?php
    }
    ?>
</table>
<br>
<h4>Supprimer une commande : </h4>
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="id">Numéro de commande : </label>
    <input type="text" id="id_com" name="id_com">&nbsp;
    <input type="submit" name="submit_ids" value="Supprimer" id="submit_ids">
</form>
<?php
}
    ?>

