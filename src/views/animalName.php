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
    <title>
        <?php echo !empty($details) ? htmlspecialchars($details[0]['animal_nom']) : 'Animal inconnu'; ?>
    </title>
</head>


<body>

    <header>
        <?php
            include_once __DIR__ .'/includes/navbar.php';?>
        <div class="cover">
            <div class="carousel-caption d-flex align-items-center justify-content-center mb-5 py-5 ">
                <h1><?php echo htmlspecialchars($details['animal_nom'])?></h1>
            </div>
            
            <img src="data:image/jpeg;base64,<?= base64_encode($details['image']) ?>" 
            class="card-img-top img-cover " alt="<?php echo ($details['animal_nom']) ?>">  
        </div>
    </header>

    <main>
        <section class="info text-white">
            <div class="container">
                <div class="row align-items-center">
                    <h1 class="text-center fw-bold m-5 pt-5">Fiche d'information</h1>
                    <div class="col-6">
                    <?php 
                    foreach($rapports as $rapport){ 
                    ?>
                    <div class="card-body">
                        <p><strong> Nom Animal :</strong> <?php echo htmlspecialchars($rapport['animal_nom']) ;?></p>
                        <p><strong> Habitat :</strong> <?php echo htmlspecialchars($rapport['nom']) ;?></p>
                        <p><strong> Classe :</strong> <?php echo htmlspecialchars($rapport['nom_classe']) ;?></p>
                        <p><strong> Etat :</strong> <?php echo htmlspecialchars($rapport['etat']) ;?></p>
                        <p><strong> Type de Nouriture :</strong> <?php echo htmlspecialchars($rapport['foodType']) ;?></p>
                        <p><strong> Quantité :</strong> <?php echo htmlspecialchars($rapport['quantite']) ;?></p>
                        <p><strong> Date :</strong> <?php echo htmlspecialchars($rapport['date']) ;?></p>
                        <p><strong> Détaile :</strong> <?php echo htmlspecialchars($rapport['detail']) ;?></p>
                    </div>
                    <?php } ?>
                    </div>  
                    <div class="col-4">
                        <img src="data:image/jpeg;base64,<?= base64_encode($details['image']) ?>" class="img-lion mb-4" alt="<?php echo ($details['animal_nom']) ?>">
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
            include_once __DIR__ .'/includes/footer.php';
        ?>

    </footer>
    <script src="../Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Assets/js/animaux.js"></script>
</body>

</html>