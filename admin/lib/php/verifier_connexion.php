<?php
if(!isset($_SESSION['admin'])){
    print "Accès réservé";
    session_destroy();
    ?>
    <meta http-equiv="refresh": content="2;URL=../index.php">
    <?php
}
