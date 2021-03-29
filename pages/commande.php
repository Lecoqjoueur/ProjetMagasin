<br>
<div class="btn-group">
    <a href="index.php?page=mescommandes.php" class="btn btn-primary">Voir mes commandes</a>
</div>
<form method="GET" action="<?php print $_SERVER['PHP_SELF'];?>">
    </br>
    <p>Veuillez remplir tous les champs avant de confirmer</p>
    <fieldset>
        <legend>Commande</legend>
        <p>Petit rappel pour l'identifiant des différents produits proposés</p>

        <table>
            <tr>
                <th><label for="quantite">  Numéro du produit   </label></th>
                <th><input type="number" id ="num" name="num"/></th>
            </tr>
            <tr>
             <th><label for="quantite">  Quantité  </label></th>
             <th> <input type="number" id ="quantite" name="quantite"/></th>
            </tr>
        </table>
    </fieldset>
    </br>
    </br>
    <fieldset class="com2">
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
    </fieldset>
    </br>
    <input type="submit" name="commander" value="commander"/>
    <input type="reset" name="annuler" value="Annuler"/>
    </br>
</form>
