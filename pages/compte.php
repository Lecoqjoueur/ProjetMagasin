
<div id="compte">
    <h1>Créer un compte</h1>


    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" >
        <table>
            <tr>
                <td><label for="Nom">Nom d'utilisateur : </label></td>
                <td><input type="text"id="Nom"  name="Nom" />
                </td>
            </tr>
            <tr>
                <td><label for="Mdp">Mot de passe :</label></td>
                <td><input type="text"id="Mdp"  name="Mdp" />
                </td>
            </tr>
            <tr>
                <td>Adresse :</td>
                <td><textarea rows="3" cols="21" name="Adresse" id="Adresse"></textarea></td>
                </td>
            </tr>
            <tr>
                <td><label for="Telephone">Telephone :</label></td>
                <td><input type="number"id="Telephone"  name="Telephone" />
                </td>
            </tr>
            <tr>
                <td><label for="mail">Email :</label></td>
                <td><input type="text"id="mail"  name="mail" />
                </td>
            </tr>

            <tr>
                <td><input type="submit" name="ajouter" value="ajouter"/></td>
                <td><input type="reset" name="annuler" value="Annuler"/></td>
            </tr>
            <tr>
        </table>
    </form>
</div>
