<?php
if(!isset($_SESSION['client'])){
    print "Veuillez vous connectez pour continuer";
    session_destroy();
    ?>
    <meta http-equiv="refresh": content="2;URL=index.php">
    <?php
}
