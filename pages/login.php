<h1>Bienvenue dans la partie "Connexion au Compte"</h1>
<div id="connect">
    <h1>Se connecter</h1>
    <form method="POST" action="<?php print $_SERVER['PHP_SELF']; ?>" >
        <table>
            <tr>
                <td><label for="Nom">Nom :</label></td>
                <td><input type="text" id="Nom" name="Nom" /></td>
            </tr>
            <tr>
                <td><label for="Prenom">Prénom :</label></td>
                <td><input type="text" id="Prenom" name="Prenom" /></td>
            <tr>
                <td><label for="Mdp">Mot de Passe :</label></td>
                <td><input type="password" id="Mdp" name="Mdp" /></td>
            </tr>
        </table>
        <p><input type="submit" id="connexion" name="connexion" value="Connexion" /></p>
    </form>

</div>

<div id="compte">
    <h1>Créer un compte</h1>


    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" >
        <table>
            <tr>
                <td><label for="Nom">NOM :</label></td>
                <td><input type="text"id="Nom"  name="Nom" />
                </td>
            </tr>
            <tr>
                <td><label for="Prenom">PRENOM :</label></td>
                <td><input type="text" id="Prenom" name="Prenom" />
                </td>
            </tr>
            <tr>
                <td>ADRESSE :</td>
                <td><textarea rows="3" cols="21" name="Adresse" id="Adresse"></textarea></td>
                </td>
            </tr>
            <tr>
                <td><label for="Telephone">TELEPHONE *:</label></td>
                <td><input type="number"id="Telephone"  name="Telephone" />
                </td>
            </tr>
            <tr>
                <td><label for="mail">ADRESSE MAIL * :</label></td>
                <td><input type="text"id="mail"  name="mail" />
                </td>
            </tr>
            <tr>
                <td><label for="Mdp">MOT DE PASSE :</label></td>
                <td><input type="text"id="Mdp"  name="Mdp" />
                </td>
            </tr>

            <tr>
                <td><input type="submit" name="ajouter" value="ajouter"/></td>
                <td><input type="reset" name="annuler" value="Annuler"/></td>
            </tr>
            <tr>
                <td></br> * = facultatif</td>
        </table>
    </form>
</div>
