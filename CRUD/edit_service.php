<?php
include_once('../includes/database.php');

if(isset($_POST['submit'])){
    $service_id = intval($_POST['service_id']);
    $service_nom = $_POST['service_nom'];
    $description = $_POST['description'];
//    préparer la requete

$req = $bdd->prepare("UPDATE service SET service_nom = :service_nom, description = :description WHERE service_id = :service_id");

$req->bindParam(':service_id',$service_id, PDO::PARAM_INT);
$req->bindParam(':service_nom',$service_nom, PDO::PARAM_STR);
$req->bindParam(':description',$description, PDO::PARAM_STR);

$request= $req->execute();

try{
    if ($request == true){
        echo"service à été modifié avec succés";
    }else{
        echo "Echec"; 
    }
} catch (PDOException $e) {
    echo "Erreur  :" . $e->getMessage();
}
header("Location: ../roles/admin.php#services");
exit();

}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css" >
    <title>modifier les services de zoo</title>
</head>
<body>
    <div>
        <h3 class="text-success text center m-4"> Modifier  des services de zoo</h3>
    </div>

<?php
if(isset($_GET['service_id'])){

    $service_id = $_GET['service_id'];

    //  on récupere le contenue de la table animal
    
    $stmt = $bdd->prepare('SELECT * FROM `service` WHERE service_id = ?');
    $stmt->execute(array($service_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

}
?>
    <form method="POST" id="formService" class="m-4">
        <div class="mb-3">
            <input type="hidden" name="service_id" value="<?=$row['service_id'] ?>"  class="form-control" >
        </div>

        <div class="col-md-3">
        <label for="service_nom" class="form-label">Nom</label>
        </div>
        <div class="col-md-9">
        <input type="text" name="service_nom" value="<?=$row['service_nom'] ?>" class="form-control" >
        </div>

        <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
        <input type="text" name="description" value="<?=$row['description'] ?>"  class="form-control" >
        </div>

        <button name="submit" class="btn btn-success mt-4">Enregistrer</button>

    </form>
    
</body>
</html>

