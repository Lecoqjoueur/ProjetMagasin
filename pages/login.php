<h1>Bienvenue dans la partie "Connexion au Compte"</h1>
<header class="img_header">
    <a href="index.php?page=disconnect.php">Déconnexion</a>
</header>
<?php
if(isset($_SESSION['client'])){
    ?>
    <p style="color:#FF0000; font-weight:bold;">Vous êtes déja connecté</p>
<?php
}
if(isset($_POST['submit'])){
    extract($_POST,EXTR_OVERWRITE);
    //print "login : ".$username. " et password : ".$mdp;
    $ad = new ClientBD($cnx);
    $client = $ad->getClient2($username, $mdp);
    //var_dump($admin);
    if($client){
        $_SESSION['client']=1;
        print "Bienvenue ".$username;
    } else{
        $message="Identifiants incorrects";
    }
}
?>
<p class=""><?php
    if(isset($message)){
        print $message;
    }
    ?></p>
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Nom d'utilisateur</label>
        <input type="username" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="mdp" class="form-control" id="mdp" name="mdp">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

    <br>
    <a href="index.php?page=compte.php" class="btn btn-primary">Créer un compte</a>
    <a href="admin/index.php?page=accueil_admin.php" class="btn btn-primary">Compte Admin</a>
    <br>

</div>

