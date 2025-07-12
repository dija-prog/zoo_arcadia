
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/crud.css">
    <title>modifier les services de zoo</title>
</head>

<body>
    <form method="POST" action="/edit_service/<?php echo $service['service_id'] ?>" id="formService" class=" text-white m-4">
        
        <h3 class="text-success text-center m-4"> Modifier des services de zoo</h3>
    
        <div class="mb-3">
            <input type="hidden" name="service_id" value="<?= $service['service_id'] ?>" class="form-control">
        </div>

        <div class="col-md-3">
            <label for="service_nom" class="form-label">Nom</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="service_nom" value="<?= $service['service_nom'] ?>" class="form-control">
        </div>

        <div class="col-md-3">
            <label for="description" class="form-label">Description</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="description" value="<?= $service['description'] ?>" class="form-control">
        </div>
    

        <button name="submit" class="btn btn-success mt-4">Enregistrer</button>

    </form>

</body>

</html>