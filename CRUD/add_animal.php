
<?php
include_once('../includes/database.php');


    if ($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $animal_nom = $_POST['animal_nom'];
    $etat = $_POST['etat'];
    $id_classe = $_POST['id_classe'];
    $habitat_id =$_POST['habitat_id'];



    $stmt = $bdd->prepare("INSERT INTO animal (animal_nom,etat,id_classe,habitat_id) VALUES (?,?,?,?)");
    try{

        if ($stmt->execute(array($animal_nom,$etat,$id_classe,$habitat_id))){
            echo "ajout de l'animal réussie";
            header("location: ../roles/admin.php#animaltable");
    
        }else{
            echo "erreur d'ajout";
        } 
    }catch (PDOException $e){
            echo"Ereeur:" .$e->getMessage();
        }

    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <title>Ajout d'animal</title>
</head>
<body>

    <form method="POST" class="m-5 py-3" >
        <h4 class="text-success">Ajouter un animal</h4>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Nom</label>
            <input type="text" name="animal_nom"   class="form-control" >
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">habitat</label>
            <input type="text" name="habitat_id" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">la classe</label>
            <input type="text" name="id_classe" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">l'état de l'animal</label>
            <input type="text" name="etat" class="form-control" >
        </div>
        
        <button type="submit"  name="submit" class="btn btn-Success">Ajouter</button>
    </form>
</body>
</html>