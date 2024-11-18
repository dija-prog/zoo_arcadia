<?php

include_once('../includes/database.php');
require('../vendor/autoload.php');



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/animals.css">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <img src="../images/peroquet1.jpg" class="d-block w-100  " alt="Peroquet">
                </div>
                <div class="carousel-item">
                    <img src="../images/hippopotame.jpg" class="d-block w-100  " alt="hippopotame">
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
                <div class="form-floating">
                    <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example">
                        <option selected>Trier par </option>
                        <option value="1">Classe</option>
                        <option value="2">Habitat</option>                  
                    </select>
                </div>
        </div>
        
    
        <!-- animals card -->
        <div class="cards row row-cols-1 row-cols-md-4 g-3 p-5" >
            <?php 
                $animal = "select * FROM  animal  ";
                $stmt = $bdd->prepare($animal);
                $stmt->execute();
                $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($animals as $animal) {

                $image = base64_encode($animal['image']);
                $animalName = strtolower(str_replace('','_',$animal['animal_nom']));

            ?>
            
            <div class="card h-100 " data-animal-id ="<?php echo ($animal['animal_id'])?>" >
                <a href="animalName.php?animal_nom=<?php echo $animal['animal_nom'];?>">
                <img src="data:image/jpeg;base64,<?php echo ($image) ?>" class="card-img-top " alt="<?php echo ($animal['animal_nom']) ?>">
                </a>
                <div class="card-body text-white bg-black d-flex align-items-center justify-content-center">
                    <h5 class="card-title"><?php echo ($animal['animal_nom']) ?></h5> 
                    <br>
                    <p><i class="fas fa-eye" aria-hidden="true"></i>:<?php echo "1"; ?></p> 
                </div>
            </div>
            <?php } ?>
        </div>
    </main>
    <footer>
        <?php
        include_once('../includes/footer.php');
        ?>

    </footer>
    <script src="../Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Assets/js/animals.js"></script>
</body>
</html>