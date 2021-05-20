<?php
include ('./lib/php/verifier_connexion.php');
if(isset($_SESSION['client'])){

    $prod = new ProduitBD($cnx);
    $commande= new CommandeBD($cnx);
    $liste =  $prod->getProduit();
    $nbr =count ($liste);
    if(isset($_GET['commander'])) {
        //var_dump($_GET);
        extract($_GET,EXTR_OVERWRITE);
        if($quantite>0) {
            // $id_p = $liste[$i]->id_prod;
            //   $p = $liste[$i]->prix;
            //   $p = $p * $quantite;
            // $retour = $commande->ajout_commande($id_p, $p, $quantite);
            $commande->ajout_commande($id_prod,$quantite,$_SESSION['username']);
            ?>
            <p style="color:green; font-weight:bold;">Commande effectué</p>
            <?php
            //print "retour : " . $retour;
        }
        else{
            print ("Informations incorrects ou manquantes");
        }
    }
    ?>

    <br>
    <div class="btn-group">
        <a href="index.php?page=mescommandes.php" class="btn btn-primary">Voir mes commandes</a>
    </div>
    <br>
    <form method="GET" action="<?php print $_SERVER['PHP_SELF'];?>">
        </br>
        <p>*Veuillez remplir tous les champs avant de confirmer*</p>
        <fieldset class="com">
            <legend>Commande</legend>
            <br><br>
            <table>
                <tr>
                    <select class="com1" name="id_prod">
                        <option></option>
                        <?php
                        for($i=0;$i<$nbr;$i++)
                        {
                            ?><option value="<?php print $liste[$i]->id_prod;?>"><?php
                            print $liste[$i]->nom." ( ".$liste[$i]->prix." €)";
                            ?></option>
                            <?php
                        }
                        ?>
                    </select>

                    <!--<th><label for="quantite">  Numéro du produit   </label></th>-->
                    <!--<th><input type="number" id ="num" name="num"/></th>-->
                </tr>
                <tr>
                    <th><label for="quantite">  Quantité  </label></th>
                    <th> <input type="number" id ="quantite" name="quantite"/></th>
                </tr>
            </table>
        </fieldset>
        </br>
        <!--<fieldset class="com">
         <legend>Informations de la carte bancaire</legend>
         </br>
         <fieldset class="com3">
             <legend>Type de carte bancaire</legend>
             <ol>
                 <li><input type="radio" name="carte" value="V" id="visa"/>
                     <label for="visa">Visa</label></li>
                 <li><input type="radio" name="carte" value="A" id="amex"/>
                     <label for="amex">AmEx</label></li>
                 <li><input type="radio" name="carte" value="M" id="master"/>
                     <label for="master">Mastercard</label></li>
             </ol>
         </fieldset>
         <ul>
             <li><label for="numero">N<sup>o</sup>de carte</label>
                 <input type="text" id ="numero" placeholder="---- ---- ---- ----"/></li></br>
             <li><label for="securite">Code de sécurité</label>
                 <input type="text" id ="securite" name="securite" placeholder="code à 3 chiffres"/></li></br>
             <li><label for="porteur">Nom du porteur</label>
                 <input type="text" id ="porteur" name="porteur" placeholder="Meme nom que sur la carte"/></li>
         </ul>
     </fieldset>-->
        </br>
        <input type="submit" name="commander" value="commander"/>
        <input type="reset" name="annuler" value="Annuler"/>
        </br>
    </form>
    <?php
}
?>