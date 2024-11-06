<?php

use Egulias\EmailValidator\Warning\EmailTooLong;

include_once('../includes/database.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylsheet" href="../Assets/css/animals.css">
    <link rel="stylsheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <title>Animals</title>
</head>
<body>
    <header>
        <?php
        include_once('../includes/navbar.php');
        ?>

        <!-- carousel  -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../images/juguar2.jpg" class="d-block w-100  " alt="juguare">
                </div>
                <div class="carousel-item">
                    <img src="../images/peroquet1.jpg" class="d-block w-100 " alt="Peroquet">
                </div>
                <div class="carousel-item">
                    <img src="../images/hippopotame.jpg" class="d-block w-100 " alt="hippopotame">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </header>
    <main >
        <h3 class="text-center  text-success m-5 py-4">Nos Animaux</h3>
        <div class="row g-2 mb-4">
            
            <
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                        <option selected>Trier par Classe</option>
                        <option value="1">Mamifire</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="3">Three</option>                    
                    </select>
                </div>
            </div>
        </div>
        <!-- animals card -->
        <div class="cards row row-cols-1 row-cols-md-4 g-3 p-5">
            <?php 
            $animals = $bdd->query("select * from animal")->fetchAll();
            foreach($animals as $animal) :
            $image = base64_encode($animal['image']);
            $animalName = strtolower(str_replace('','_',$animal['animal_nom']));
            ?>
            
            <div class="card " data-name ="<?php echo htmlspecialchars($animal['habitat_id'])?>">
                <a href="<?php echo $animalName; ?>.php">
                <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($image) ?>" class="card-img-top  " alt="<?php echo htmlspecialchars($animal['animal_nom']) ?>"> 
                </a>
                <div class="card-body text-white bg-black d-flex align-items-center justify-content-center">
                    <h5 class="card-title"><?php echo htmlspecialchars($animal['animal_nom']) ?></h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <?php
        include_once('../includes/footer.php');
        ?>

    </footer>
    <script src="../Assets/Bootstraps/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.min.js"></script>
    <script src="../Assets/js/animaux.js"></script>
</body>