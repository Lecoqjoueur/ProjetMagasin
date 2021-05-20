<?php
include ('./lib/php/verifier_connexion.php');
ini_set('display_errors','off');
$prod = new CommandeBD($cnx);

$liste =  $prod->getCommandeByUser($_SESSION['username']);
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
    <label for="id_com">Numéro de commande : </label>
    <select class="com1" name="id_com" id="id_com">
        <option>Numéro de commande</option>
        <?php
        for($i=0;$i<$nbr;$i++)
        {
            ?><option value="<?php print $liste[$i]->id_com;?>"><?php
            print "commande numéro : ".$liste[$i]->id_com;
            ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="submit_ids" value="Supprimer" id="submit_ids">
</form>
<?php
}
    ?>

