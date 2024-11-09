<?php
require('../includes/database.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_GET['avis_id'])){
    $avis_id = (int)$_GET['avis_id'];

    try{
        $stmt = $bdd->prepare("UPDATE avis SET isValide = 1 WHERE avis_id = ?");
        if ($stmt->execute([$avis_id])) {
            echo"Avis valide avec succès";
        } else {
            echo "Erreur lors de la validation de l'avis.";
        }
        header("Location:./employé.php");
        exit;

    } catch (PDOException $e){
        echo"Erreur " .$e->getMessage();
    }
}



?>