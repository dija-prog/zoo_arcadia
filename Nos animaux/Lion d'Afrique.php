<?php
include_once('../includes/database.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-css -->
    <link rel="stylesheet" href="../Assets/css/animaux.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">

    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">   
    <title>Lion d'Afrique</title>
</head>
<body>

    <header>
    <?php
    include('../includes/navbar.php');
    ?>
    <div class="cover">
        <div class="carousel-caption d-flex align-items-center justify-content-center mb-5 py-5 ">
            <h1 > Lion d'Afrique</h1>
        </div>
        <img src="../images/lion.jpg" class="d-block w-100 img-cover" alt="photo de couverture">
    </div>
    </header>
    <main>
        <section class="info text-white">
            <div class="container">
                <div class="row align-items-center">
                    <h1 class="text-center fw-bold m-5">Fiche d'information</h1>
                    <div class="col-6">
                        <p><strong> Nom scientifique :</strong> Panthera leo</p>
                        <p><strong> Classification : </strong>  Mammifère</p>
                        <p><strong> Taille moyenne : </strong> 1m50 à 2m50 de long, 1m à 1m20 au garrot</p>
                        <p><strong> Poids moyen :   </strong> Femelles 120 à 190kg / Mâles 150 à 270kg</p>
                        <p><strong> Habitat :</strong> Forêts tropicales sèches, Savanes</p>
                        <p><strong> Régime Alimentaire :</strong> Carnivore</p>
                        <p><strong> Comportement social :</strong> En groupes jusqu'à 40 individus</p>
                        <p><strong> Période de reproduction :</strong> Toute l'année</p>
                        <p><strong> Maturité sexuelle :</strong> Vers 3-4 ans</p>

                    </div>
                    <div class="col-4">
                        <img src="../images/LE LION.jpg" alt="LE LION" class="img-lion mb-4">
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
    <script src="../Assets/Bootstraps/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.min.js"></script>
    <script src="../Assets/js/animaux.js"></script>
</body>

</html>