<?php

$client= new CLientBD($cnx);

if(isset($_GET['commander'])) {
//var_dump($_GET);
        extract($_GET, EXTR_OVERWRITE);
    if (!empty($username) && !empty($mdp) && !empty($adresse) && !empty($tel) && !empty($email) && $cp>0) {
        $client->ajout_client($username, $mdp, $adresse, $tel, $email, $cp);
        ?>
        <p style="color:green; font-weight:bold;">Bienvenue sur TechnoShop <?php $username ?></p>
        <?php
        ?>
        <meta http-equiv="refresh": content="2;URL=index.php?page=accueil.php">
<?php
    }
    else{
        print ("*** informations manquantes ou éronnées ***");
    }
}

?>

    <h1>Créer un compte</h1>


    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method="get" >
        <div class="col-md-4">
            <label for="username" class="form-label">Nom d'utilisateur : </label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="col-md-5">
            <label for="mdp" class="form-label">Mot de passe : </label>
            <input type="password" class="form-control" id="mdp" name="mdp">
        </div>
        <div class="col-md-11">
            <label for="adresse" class="form-label">Adresse : </label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div>
        <div class="col-md-3">
            <label for="cp" class="form-label">Code postal : </label>
            <input type="number" class="form-control" id="cp" name="cp">
        </div>
        <div class="col-md-5">
            <label for="tel" class="form-label">Telephone : </label>
            <input type="text" class="form-control" id="tel" name="tel">
        </div>
        <div class="col-md-5">
            <label for="email" class="form-label">Email : </label>
            <input type="text" class="form-control" id="email" name="email">
        </div>
        <br>
        <input type="submit" name="commander" value="Creer"/>
        <input type="reset" name="annuler" value="Annuler"/>
    </form>

