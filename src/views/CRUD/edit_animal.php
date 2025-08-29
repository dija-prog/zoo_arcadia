

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/crud.css">
    <title>modifier l'animal</title>
</head>
<body>
    

    <form id='animalForm' method="POST" action="/editAnimal/<?php echo $animal['animal_id'] ?>" class="m-5 py-3" >
        <h4 class="text-success text-center fw-bold ">Modifier l'animale</h4>
        <input type="hidden" name="animal_id" value="<?= isset($animal['animal_id']) ? htmlspecialchars($animal['animal_id']) : '' ?>">
        <label class="form-label text-white ml-2 p-2" >Nom de l'animal: </label>
        <input type="text" name="animal_nom" value="<?= isset($animal['animal_nom']) ? htmlspecialchars($animal['animal_nom']) : '' ?>">

        <label class="form-label text-white ml-2 p-2" >Classe</label>
        <select name="id_classe">
            <?php foreach ($classes as $classe): ?>
                <option value="<?= $classe['id_classe'] ?>"
                    <?= isset($animal['id_classe']) && $classe['id_classe'] == $animal['id_classe'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($classe['nom_classe']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label class="form-label text-white ml-2 p-2"> Habitat : </label>
        <select name="habitat_id" Classe="p-2">
            <?php foreach ($habitats as $habitat): ?>
                <option value="<?= $habitat['habitat_id'] ?>" 
                    <?= isset($animal['habitat_id']) && $habitat['habitat_id'] == $animal['habitat_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($habitat['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit"  name="submit" class="btn btn-success">Modifier</button>
    </form>
    
</body>
</html>