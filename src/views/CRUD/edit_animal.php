

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <title>modifier l'animal</title>
</head>
<body>
    

    <form id='animalForm' method="POST" action="/editAnimal" class="m-5 py-3" >
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