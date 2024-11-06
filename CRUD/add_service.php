<?php
include_once('../includes/database.php');


    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $nom = $_POST['service_nom'];
        $description = $_POST['description'];
    
        $service = $bdd->prepare("INSERT INTO `service` (service_nom,description) VALUES (?,?)");
        $service->execute(array($nom,$description));

    echo " le service bien ajouter "; 
    header('Location: ../roles/admin.php#services');
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css" >
    <title>Document</title>
</head>
<body>
    <div>
        <h3 class="text-success text center"> Ajouter des services au tableau</h3>
    </div>

    <form method="POST" id="formService">

        <div class="col-md-3">
        <label for="nom" class="form-label">Nom</label>
        </div>
        <div class="col-md-9">
        <input type="text" name="service_nom" class="form-control" >
        </div>

        <div class="col-md-3">
        <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
        <input type="text" name="description"   class="form-control" >
        </div>

        <button name="envoyer" class="btn btn-success mt-4">Envoyer</button>

    </form>
    
</body>
</html>