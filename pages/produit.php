<?php
$prod = new ProduitBD($cnx);

$liste =  $prod->getProduit();

$nbr =count ($liste);
?>

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
                                <div class="btn-group">
                                    <a href="index.php?page=commande.php">Commander</a>
                                </div>
                        </td>
                  </tr>
                <?php
            }
            ?>
            </table>

