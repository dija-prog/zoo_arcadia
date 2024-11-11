<?php 
include_once ('../includes/database.php');
$username= $_GET['username'];


// créer une requête pour la suppression de user

$req = $bdd->prepare("DELETE FROM utilisateur where username = :username");
$req->bindParam(':username',$username, PDO::PARAM_STR);
if($req->execute()){
    echo"l'utilisateur a été supprimer";
}else{
    echo "Erreur lors de la suppression de l'utilisateur";
}


header("Location: ../roles/admin.php#usertable");

?>

<?php

$animal_id = $_GET['animal_id'];

// créer une requête pour la suppression d'animale

$req = $bdd->prepare("DELETE FROM animal where animal_id = :animal_id");
$req->bindParam(':animal_id',$animal_id, PDO::PARAM_INT);
if($req->execute()){
    echo"l'animal a été supprimer";
    header("Location: ../roles/admin.php#animaltable");
}else{
    echo "Erreur lors de la suppression de l'animal";
}


?>

<!-- supprimer les services de zoo -->

<?php
$service_id= $_GET['service_id'];

// créer une requête pour la suppression de service

$req = $bdd->prepare("DELETE FROM service where service_id= :service_id");
$req->bindParam(':service_id',$service_id, PDO::PARAM_STR);
if($req->execute()){
    echo"le service a été supprimer";
}else{
    echo "Erreur lors de la suppression de service";
}


header("Location: ../roles/admin.php#services");

?>

<!-- supprimer  les valeurs de la tbale food  -->

<?php
$id_food= $_GET['id_food'];

try{
    $req = $bdd->prepare("DELETE FROM food where id_food= :id_food");
    $req->bindParam(':id_food',$id_food, PDO::PARAM_STR);
    if($req->execute()){
        echo" il a bien été supprimer";
    }else{
        echo "Erreur lors de la suppression ";
    }
    
    
    header("Location: ../roles/employé.php");
    exit;

}catch(PDOException $e){
    echo"Ereeur:" .$e->getMessage();
}


?>




