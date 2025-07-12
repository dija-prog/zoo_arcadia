<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/crud.css">
    <title>modifier la nouriture de l'animal</title>
</head>

<body>
    <form method="POST" action="/edit_food/<?php echo $food['id_food'] ?>" id="formService" class=" text-white m-4">
        
        <h3 class="text-success text-center m-4"> Modifier la nouriture de l'animal</h3>
    
        
        <div class="mb-3">
            <input type="hidden" name="service_id" value="<?= $food['id_food'] ?>" class="form-control">
        </div>


        <div class="col-md-3">
            <label for="animal_nom" class="form-label">Nom de l'animal</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="animal_nom" value="<?= $food['animal_nom'] ?>" class="form-control">
        </div>

        <div class="col-md-3">
            <label for="foodType" class="form-label">foodType</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="foodType" value="<?= $food['foodType'] ?>" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="quantite" class="form-label">quantite</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="quantite" value="<?= $food['quantite'] ?>" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="Date" class="form-label">Date</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="Date" value="<?= $food['Date'] ?>" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="Heure" class="form-label">Heure</label>
        </div>
        <div class="col-md-9">
            <input type="text" name="Heure" value="<?= $food['Heure'] ?>" class="form-control">
        </div>
  

        <button name="submit" class="btn btn-success mt-4">Enregistrer</button>

    </form>

</body>

</html>