<?php
include_once('../includes/database.php');
$animal_nom = $_GET['animal_nom'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-css -->
    <link rel="stylesheet" href="../Assets/css/animaux.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="../images/fiveicon.png">
    <title><?php echo $animal_nom?></title>
</head>

<body>

    <header>
        <?php
        include('../includes/navbar.php');
        ?>
        <?php
        $animal = "select * FROM  animal where animal_nom = :animal_nom ";
        $stmt = $bdd->prepare($animal);
        $stmt->bindParam(':animal_nom',$animal_nom, PDO::PARAM_STR);
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($animals as $animal){
        ?>
        <?php 
            $image = base64_encode($animal['image']) ?>
        <div class="cover">
            <div class="carousel-caption d-flex align-items-center justify-content-center mb-5 py-5 ">
                <h1><?php echo $animal_nom?></h1>
            </div>
            <img src="data:image/jpeg;base64,<?php echo ($image) ?>" class="card-img-top img-cover " alt="<?php echo ($animal['animal_nom']) ?>">  
        </div>
        <?php } ?>
    </header>
    <main>
        <section class="info text-white">
            <div class="container">
                <div class="row align-items-center">
                    <h1 class="text-center fw-bold m-5 pt-5">Fiche d'information</h1>
                    <div class="col-6">
                    <?php 
                    $req = "SELECT animal.animal_nom, rapport_veterinaire.*, habitat.*, classe.* FROM animal JOIN rapport_veterinaire ON animal.animal_nom = rapport_veterinaire.animal_nom JOIN habitat ON animal.habitat_id = habitat.habitat_id JOIN classe ON animal.id_classe = classe.id_classe where animal.animal_nom = :animal_nom; ";
                    $stmt = $bdd->prepare($req);
                    $stmt->bindParam(':animal_nom',$animal_nom, PDO::PARAM_STR);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row){ 
                    ?>
                    <div class="card-body">
                        <p><strong> Nom Animal :</strong> <?php echo htmlspecialchars($row['animal_nom']) ;?></p>
                        <p><strong> Habitat :</strong> <?php echo htmlspecialchars($row['nom']) ;?></p>
                        <p><strong> Classe :</strong> <?php echo htmlspecialchars($row['nom_classe']) ;?></p>
                        <p><strong> Etat :</strong> <?php echo htmlspecialchars($row['etat']) ;?></p>
                        <p><strong> Type de Nouriture :</strong> <?php echo htmlspecialchars($row['foodType']) ;?></p>
                        <p><strong> Quantité :</strong> <?php echo htmlspecialchars($row['quantite']) ;?></p>
                        <p><strong> Date :</strong> <?php echo htmlspecialchars($row['date']) ;?></p>
                        <p><strong> Détaile :</strong> <?php echo htmlspecialchars($row['detail']) ;?></p>
                    </div>
                    <?php } ?>
                    </div>  
                    <div class="col-4">
                        <img src="data:image/jpeg;base64,<?php echo ($image) ?>" class="img-lion mb-4" alt="<?php echo ($animal['animal_nom']) ?>">
                    </div>
                </div>
            </div>
        </section>

        <section class="buy">
            <div class="mt-5 py-5">
                <h5>Acheter vos billet dés maintenant </h5>
                <button class="btn btn-warning ">
                    billetrie
                </button>
            </div>
        </section>
    </main>
    <footer>
        <?php
        include('../includes/footer.php');
        ?>

    </footer>
    <script src="../Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Assets/js/animaux.js"></script>
</body>

</html>