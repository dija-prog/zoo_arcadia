<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/crud.css">
    <title>Ajouter les données de nouriture des animaux</title>
</head>
<body class="add_food ">
    <div class="container-fluid m-5 py-4 ">
        <h2 class="text-success text-center fw-bold mb-5 ">  La consommation des animaux</h2>
        <form method="POST"  action="/add_food"  class="mt-5 text-white ">
            <div class="form-group mb-5" for="animal">
                <select class="form-control" id="animal" name="animal_nom" required>
                    <option selected>Choisir un Animal</option>
                    <?php foreach($animals as $animal){ ?>
                    <option value="<?php echo htmlspecialchars($animal['animal_nom']);?>"> 
                        <?php echo htmlspecialchars($animal['animal_nom']);?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group mb-5">
                <label for="food"> Type de Nouriture :</label>
                <input class="from-control" type="text" id="food" name="foodType" required>
            </div>

            <div class="form-group mb-5">
                <label for="quantite"> Quantité(gr) :</label>
                <input class="from-control" type="number" id="quantite" name="quantite" required>
            </div>

            <div class="form-group mb-5">
                <label for="date"> Date:</label>
                <input class="from-control" type="date" id="date" name="date" required>
            </div>

            <div class="form-group mb-5">
                <label for="heure"> Heure :</label>
                <input class="from-control" type="time" id="heure" name="heure" required>
            </div>
            <button type= "submit" class="btn btn-warning  mb-4">Enregistrer </button>

        </form>
    </div>

    
</body>
</html>