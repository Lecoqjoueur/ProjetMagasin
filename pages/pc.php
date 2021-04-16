<br>
<h2>Liste des PC disponibles</h2>
<br>
<?php
$prod = new ProduitBD($cnx);

$liste =  $prod->getProduitPC();

$nbr =count ($liste);
?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            for($i=0;$i<$nbr;$i++){

                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./admin/images/<?php print $liste[$i]->image; ?>" alt="Image"/>


                        <div class="card-body">
                            <p class="card-text">
                                <?php
                                print $liste[$i]->nom;
                                ?>
                                <br>
                                <?php
                                print $liste[$i]->description;
                                ?>
                                <br>
                                <?php
                                print $liste[$i]->prix;
                                ?>
                                €
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="index.php?page=commande.php" class="btn btn-primary">Commander</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

