<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">


    <title>Animaux</title>
</head>
<body class="bg-black">
    <?php require_once __DIR__ .'/includes/navbar.php' ; ?>

<div class="container mt-4 ">

    <h1 class="text-light m-4 py-5 " >Liste des Animaux</h1>

    <form method="GET" action="/animaux" class="row g-3 mb-4">
        <div class="col-md-3">
            <select name="classe" class="form-select">
                <option value="">Toutes les classes</option>
                <?php foreach($classes as $c): ?>
                    <option value="<?= $c['id_classe'] ?>" <?= (isset($_GET['classe']) && $_GET['classe'] == $c['id_classe']) ? 'selected' : '' ?>>
                        <?= $c['nom_classe'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <select name="habitat" class="form-select">
                <option value="">Tous les habitats</option>
                <?php foreach($habitats as $h): ?>
                    <option value="<?= $h['habitat_id'] ?>" <?= (isset($_GET['habitat']) && $_GET['habitat'] == $h['habitat_id']) ? 'selected' : '' ?>>
                        <?= $h['nom'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">
            <button class="btn btn-warning">Filtrer</button>
        </div>
    </form>

    <div class="row">
        <?php foreach($animaux as $animal): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <?php if($animal['image']): ?>
                        <img src="../<?php echo htmlspecialchars($animal['image']) ?>" class="card-img-top" loading="lazy" alt="<?php echo htmlspecialchars($animal['animal_nom']) ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $animal['animal_nom'] ?></h5>
                        <p class="card-text">
                            Classe : <?= $animal['nom_classe'] ?><br>
                            Habitat : <?= $animal['habitat_nom'] ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

    <?php require_once __DIR__ .'/includes/footer.php' ; ?>


</body>
</html>