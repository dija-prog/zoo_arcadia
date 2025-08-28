<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/crud.css">
    <title>Ajout d'animal</title>
</head>
<body>
    <div class="container-fluid d-flex justify-content-center" >
        <form action="/addAnimal" id="add-animal-form" method="POST" class="m-5 py-3" >
            <h4 class="text-success text-center fw-bold mb-5">Ajouter un animal</h4>
            <div class="mb-4 text-white">
                <label for="exampleInputPassword1" class="form-label">Nom de l'animal</label>
                <input type="text" name="animal_nom"   class="form-control" >
            </div>
            <div class="mb-4 text-white">
                <select name="habitat_id" class="form-select" aria-label="Default select example">
                    <option selected>Nom de l'habitat</option>
                    <option value="1">Savane</option>
                    <option value="2">Jungle</option>
                    <option value="3">Marais</option>
                </select>
                
            </div>
            <div class="mb-4 text-white">
                <select name="id_classe" class="form-select" aria-label="Default select example">
                    <option selected>Nom de l'habitat</option>
                    <option value="1">Mamifiére</option>
                    <option value="2">Oiseaux</option>
                    <option value="3">Reptiles </option>
                    <option value="4">Amphibiens</option>
                </select>
                
            </div>
            <input type="submit" value="Ajouter">
        </form>
    </div>
</body>
<!-- <script src="../Assets/js/admin.js" defer></script> -->
</html>