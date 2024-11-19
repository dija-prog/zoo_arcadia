<?php
require('../includes/database.php');
if(isset($_GET['avis_id'])){
    $avis_id = (int)$_GET['avis_id'];

    $stmt = $bdd->prepare("DELETE FROM avis WHERE avis_id = ?");
    if($stmt->execute([$avis_id])){
        echo"Avis supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppresion de l'avis.";
    }
    header("Location:./employé.php");
    exit;
}
?>