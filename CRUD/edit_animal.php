<?php
include_once('../includes/database.php');

if(isset($_POST['submit'])){
    $animal_id = intval($_POST['animal_id']);
    $animal_nom = $_POST['animal_nom'];
    $habitat_id = intval($_POST['habitat_id']);
    $id_classe = intval($_POST['id_classe']);
    $etat = $_POST['etat'];
//    préparer la requete

$req = $bdd->prepare("UPDATE animal SET animal_nom = :animal_nom, habitat_id = :habitat_id, id_classe = :id_classe, etat= :etat WHERE animal_id = :animal_id");

$req->bindParam(':animal_id',$animal_id, PDO::PARAM_INT);
$req->bindParam(':animal_nom',$animal_nom, PDO::PARAM_STR);
$req->bindParam(':habitat_id',$habitat_id, PDO::PARAM_INT);
$req->bindParam(':id_classe',$id_classe, PDO::PARAM_INT);
$req->bindParam(':etat',$etat, PDO::PARAM_STR);

$request = $req->execute();

try{
    if ($request == true){
        echo"l'animal à été modifié avec succés";
    }else{
        echo "Echec"; 
    }
} catch (PDOException $e) {
    echo "Erreur  :" . $e->getMessage();
}
header("Location: ../roles/admin.php#animaltable");
exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <title>modifier l'animal</title>
</head>
<body>
    <!-- form edit animal start  -->
    <?php
    if(isset($_GET['animal_id'])){

        $animal_id = $_GET['animal_id'];

        //  on récupere le contenue de table animal
        
        $stmt = $bdd->prepare('SELECT * FROM animal WHERE animal_id = ?');
        $stmt->execute(array($animal_id));
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);

    }
    ?>

    <form id='animalForm' method="POST"  class="m-5 py-3" >
        <h4 class="text-success">Modifier l'animale</h4>

        <div class="mb-3">
        
            <input type="hidden" name="animal_id" value="<?= $animal['animal_id'] ?>"  class="form-control" >
        </div>

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="animal_nom" value="<?= $animal['animal_nom'] ?>"  class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">habitat</label>
            <input  name="habitat_id" value="<?=$animal['habitat_id']?>"  class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">la classe</label>
            <input   name="id_classe" value="<?=$animal['id_classe'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label  class="form-label">l'état de l'animale</label>
            <input  type="text" name="etat" value="<?=$animal['etat'] ?>" class="form-control" >
        </div>
        <button type="submit"  name="submit" class="btn btn-success">Modifier</button>
    </form>
    
</body>
</html>