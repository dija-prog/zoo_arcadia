<?php
include('./includes/database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/contact.css">
    <link rel="stylesheet" href="./Assets/bootstrap/css/bootstrap.min.css">
    <title>Services</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg  fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand me-5 " href="./Accueil.php">
                    <img src="./images/LOGOZOO.png" width="100" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-center " id="navbarNav">
                    <ul class="navbar-nav mb-2 mb-lg-0">

                        <li class="nav-item ">
                            <a class="nav-link" href="./Nos-animaux/animals.php" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                Nos animaux
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./Nos-animaux/habitat.php" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                Habitat
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./Nos-animaux/animals.php" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="./contact.php"> Contact </a>
                        </li>

                    </ul>
                </div>
                <button class="btn btn-success ms-4 ">
                    <a data-mdb-dropdown-init href="./login/connexion.php" role="button" aria-expanded="false">
                        <i class="fas fa-user"></i> connexion
                    </a>
                </button>
            </div>
    </header>
    <main>
        <h1 class="text-center mt-5">Venez vous restaurer dans un cadre naturel.</h1>
        <section class="restauration">
            <div class="row justify-content-center g-5 mt-5">
                <div class="card  col-12 col-md-4 mb-3 ">
                    <img class="card-img-top" src="./images/service/restaurant.jpg" class="w-100 h-100" alt="restaurant">
                    <div class="card-body">
                        <h5 class="card-title">Le self restaurant</h5>
                        <p class="card-text">
                            Profitez d'une pause déjeuner à table dans notre restaurant ou en terrasse. Ouvert toute l'année, le self-restaurant vous offre un large choix d'entrées, plats chauds, desserts et boissons.
                            * Menu adulte à partir de 18,50€ et menu enfant à 12,40€.
                            Accès privilégié pour les personnes à mobilité réduite.
                        </p>
                    </div>
                </div>
                <div class="card col-12 col-md-4 mb-3 ">
                    <img class="card-img-top" src="./images/service/hot-dog.jpg"  class="w-100 h-100" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Restauration à Emporter</h5>
                        <p class="card-text">
                            Savourez un déjeuner aux quatre coins du parc dans nos kiosques variés : pizzas, burgers, sandwichs chauds ou froids, hot-dogs, salades, en-cas sucrés et bien plus encore.
                            L'ouverture des points de restauration est variable selon la météo, nous vous invitons à vous renseigner auprès d'un(e) hôte(sse) lors de votre arrivée sur le parc.
                            Pour éviter une attente trop longue en cas d'affluence, nous vous conseillons de déjeuner avant 12h ou après 14h
                        </p>
                    </div>
                </div>

            </div>

        </section>
        <section>
            <div class="row col-sm-6 col-md-6 m-4">
                <div class="card" class="w-100 h-100" style="width: 18rem;">
                    <img class="card-img-top" src="./images/service/train.jpg" alt="Train">
                    <div class="card-body">
                        <h5 class="card-title">Petit train</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis consectetur
                            quaerat laboriosam cumque voluptatum quasi architecto quod ratione explicabo consequatur veniam
                            omnis pariatur ea ad, optio illo saepe, vel eveniet.
                            .</p>
                        <a href="#" class="btn btn-primary">acheter votre ticket</a>
                    </div>
                </div>
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./images/service/poussette.jpg" alt="poussette">
                    <div class="card-body">
                        <h5 class="card-title">louer une poussette</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas nesciunt placeat corrupti,
                            in tempora aut iure repellendus ut dolorem deserunt esse cum iste modi quidem enim libero perspiciatis.</p>
                        <a href="#" class="btn btn-primary">louer</a>
                    </div>
                </div>
            </div>
            <div class="row col-sm-6">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="./images/service/guide.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione nam illum incidunt tenetur quis dolorum possimus
                            repudiandae eos aperiam quisquam, quas corporis fugit, perspiciatis libero, nulla placeat. Delectus, sit sequi.</p>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <footer>
        <footer class="footer ">
            <div class="box-container">
                <div class="box">
                    <img src="./images/LOGOZOO.png" width="100" height="50">
                    <p class="links"><i class="fas fa-clock"></i> Lundi-vendredi</p>
                    <p class="days">7:00AM - 11:00PM</p>
                </div>
                <div class="box">
                    <h3> Contact Info</h3>
                    <a href="#" class="links"><i class="fas fa-phone"></i> 1234-456 </a>
                    <a href="#" class="links"><i class="fas fa-phone"></i> 1234-987 </a>
                    <a href="#" class="links"><i class="fas fa-envelope"></i>info@zoolife.fr </a>
                    <a href="#" class="links"><i class="fas fa-marker-alt"></i>bourdaux, France</a>
                </div>

                <div class="box">
                    <h3> Quick links</h3>
                    <a href="./Accueil.php" class="links"><i class="fas fa-arrow-right"></i> Accueill</a>
                    <a href="#" class="links"><i class="fas fa-arrow-right"></i> billet & Tarifs</a>
                    <a href="./services.php" class="links"><i class="fas fa-arrow-right"></i> Services</a>
                    <a href="./Nos-animaux/habitat.php" class="links"><i class="fas fa-arrow-right"></i> Nos animaux </a>
                    <a href="./contact.php" class="links"><i class="fas fa-arrow-right"></i> contact </a>
                </div>
            </div>
            <div class="share">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="fa-brands fa-x-twitter"></a>
                <a href="#" class="fa-brands fa-instagram"></a>
                <a href="#" class="fa-brands fa-linkedin"></a>
            </div>

            <div class="credit">&copy; 2024 Zoo Arcadia. Tous les droits sont réservées </div>

        </footer>

        <!-- script-bootstrap js  -->
    
    <script src="./Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <scrip src="./Assets/bootstrap/js/bootstrap.min.js">
</body>

</html>