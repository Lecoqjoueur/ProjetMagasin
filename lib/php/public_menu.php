<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?page=accueil.php">TechnoShop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=accueil.php">Accueil</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Compte
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=login.php">Connexion</a></li>
                        <li><a class="dropdown-item" href="index.php?page=compte.php">Créer un compte</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="admin/index.php?page=accueil_admin.php">Compte Admin</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Liste des produits
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=pc.php">PC</a></li>
                        <li><a class="dropdown-item" href="index.php?page=console.php">Console</a></li>
                        <li><a class="dropdown-item" href="index.php?page=smartphone.php">Smartphone</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="index.php?page=produit.php">Tout afficher</a></li>
                        <li><a class="dropdown-item" href="index.php?page=recherche.php">Rechercher</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Commander
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php?page=commande.php">Effectuer une commande</a></li>
                        <li><a class="dropdown-item" href="index.php?page=mescommandes.php">Afficher mes commandes</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php?page=infos.php">Coordonnées</a>
                </li>
            </ul>
            <!--<form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>-->
        </div>
    </div>
</nav>
