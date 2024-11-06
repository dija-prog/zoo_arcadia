<?php
 try {
    $bdd = new PDO('mysql:host=localhost;dbname=zoo arcadia','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>