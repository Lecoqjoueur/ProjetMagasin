<h2>Liste des consoles disponibles</h2>
<?php
$prod = new ProduitBD($cnx);

$liste =  $prod->getProduitConsole();

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
                            <?php
                            if(isset($_SESSION['client'])){
                            ?>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group" id="remove_a">
                                    <button data-id="<?php print $liste[$i]->id_prod;?>" data-bs-toggle="modal"
                                            data-bs-target="#info_produit" class="info_produit"> Commander </button>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        include('./pages/info_produit.php');
        ?>
    </div>
</div>

