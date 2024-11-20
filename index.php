<?php
include('./includes/database.php');

//Redirection vers Accueil.php
header("Location: ./Accueil.php");;
exit;

if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['DOCUMENT_ROOT'] = __DIR__;
}


?>