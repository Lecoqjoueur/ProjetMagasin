<?php
$prod = new ProduitBD($cnx);

$liste =  $prod->getAllProduit();

$nbr =count ($liste);
?>
<h2>Produits proposés</h2>

            <br>
            <table class="prod1">
            <?php
            for($i=0;$i<$nbr;$i++){
            ?>

                  <tr class="prod2">
                        <td class="prod3">
                                <?php
                                print $liste[$i]->nom;
                                ?>
                        </td>
                        <td class="prod3">
                                <?php
                                print $liste[$i]->description;
                                ?>
                        </td>
                        <td class="prod3">
                                <?php
                                print $liste[$i]->prix;
                                ?>
                                €
                        </td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group" id="remove_a">
                                    <button data-id="<?php print $liste[$i]->id_prod;?>" data-bs-toggle="modal"
                                            data-bs-target="#info_produit" class="info_produit"> Commander </button>
                                </div>
                            </div>


                        </td>
                  </tr>
                <?php
            }
            ?>
            </table>
<?php
include('./pages/info_produit.php');
?>

<a href="http://localhost/ProjetMagasin/pages/print_produit.php" class="btn btn-primary">Voir le catalogue</a>

