<?php
include('./includes/database.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/css/service.css">
    <link rel="stylesheet" href="./Assets/bootstrap/css/bootstrap.min.css">
    <title>Services</title>
</head>

<body>
    <header id="restaurant">
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
        </nav>
        <div class="cover">
            <div class=" carousel-caption row  d-flex align-items-center justify-content-center mb-5 py-5 ">
                <h1 class="mb-4"> Où manger ?</h1><br>
                <h2 class="mt-3"> Venez vous manger dans un lieu pour se détendre et savourer </h2>
            </div>
            <img src="./images/grue_couronée2.jpg" class=" d-block w-100 img-fluid" alt=girafe>
        </div>
    </header>
    <main>
        <div class="service container-fluid text-white  ">
            <div class="row">
                <h2 class="text-white text-center m-4 fw-bold"> Self-restaurant</h2>
                <div class="col-12 col-md-6 h-100 ">
                    <img src="./images/restaurant.jpg" class="imag-fluid w-100 h-25  " alt="restaurant ">
                </div>
                <div class="col-12 col-md-6">
                    <p>Après une journée riche en découvertes au Zoo Arcadia, notre self-restaurant
                        vous invite à faire une pause gourmande dans un cadre chaleureux et convivial.
                        Situé au cœur du parc, il offre une vue imprenable sur la forêt environnante,
                        parfait pour se reconnecter avec la nature tout en dégustant des plats savoureux.
                    </p>
                    <h5 class="text-warning">une cuisine pour tous les goûts</h5>
                    <p><strong>Option végetariennes et véganes:</strong>Nous proposons des plats équilibrés, préparés avec des ingrédients locaux et de saison. </p>
                    <p><strong>Menus familiaux:</strong> DE délicieux repas pour les petits et les grands, adaptés à tous les appétits.</p>
                    <h5 class="text-warning">Engagé pour l'environnement</h5>
                    <p>Le self-restaurant du Zoo Arcadia s'inscrit dans une démarche écoresponsable :
                        - Nos ustensiles sont biodégradables ou réutilisables.
                        - Nous favorisons les circuits courts pour soutenir les producteurs locaux.
                        - Une partie des recettes est reversée à nos projets de conservation de la faune.
                    </p>
                    <h5 class="text-warning"> Horaires d'ouvertures </h5>
                    <p>
                        - Ouvert tous les jours : 11h30 - 15h00
                        - Snack et boissons disponibles l'après-midi : 15h00 - 17h00
                    </p>
                </div>
            </div>
            <div class="row mt-5">
                <h2 class="text-white text-center mb-5 fw-bold"> Snack à Emporter</h2>
                <div class="col-12 col-md-6 h-100 ">
                    <img src="./images/hot-dog.jpg" class="imag-fluid w-100 h-25  " alt="restaurant ">
                </div>
                <div class="col-12 col-md-6">
                    <p>
                        Pour agrémenter votre journée au zoo, faites un arrêt au Snack à Emporter !<br>
                        Découvrez une sélection de mets rapides et savoureux, parfaits pour une pause gourmande.<br>
                        <strong class="text-success">tous les goûts :</strong> Sandwiches frais, salades colorées, snacks végétariens, et options pour enfants.<br>
                        <strong class="text-success"> rafraîchissantes :</strong> rafraîchissantes : Jus de fruits naturels, cafés, et boissons fraîches pour vous désaltérer tout au long de votre visite.<br>
                        <strong class="text-success"> gourmands : </strong> Glaces artisanales, muffins, cookies, et autres douceurs à déguster sur le pouce.<br>
                        Profitez de nos points de vente situés à des endroits stratégiques du parc, pour manger où et quand vous le souhaitez. Chaque achat soutient les initiatives de conservation du zoo !
                    <h5 class="text-warning fw-bold"> N'attendez plus : venez vous régaler tout en explorant le zoo ! </h5>
                    </p>
                </div>
            </div>
            <div class="row mt-5 d-flex justify-content-center">
                <h2 class="text-white text-center fw_bold m-5"> Services pratique pour une visite confortable</h2>

                <div class=" col-12 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/guide.jpg" class="card-img-top" alt="guide">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-warning">Guide gratuit</h5>
                            <p class="card-text text-white">Enrichissez votre visite avec nos guides experts ! Disponibles sur réservation, ils vous partageront des anecdotes passionnantes et des informations captivantes sur nos animaux.</p>
                        </div>
                    </div>
                </div>
                <div class="Ccol-12 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/poussette.jpg" class="card-img-top" alt="poussette">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-warning">Location des poussettes</h5>
                            <p class="card-text text-white">Pour le confort des plus petits, profitez de notre service de location de poussettes à l'entrée du zoo. Une solution pratique pour une journée en famille sans souci..</p>
                        </div>
                    </div>
                </div>
                <div class="card m-4" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./images/train.jpg" class="img-fluid " alt="TRAIN">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body ">
                                <h5 class="card-title  text-success">Petit train</h5>
                                <p class="card-text  ">Découvrez le zoo autrement à bord de notre petit train ! Une manière relaxante et ludique de parcourir le parc tout en profitant d'une vue panoramique sur les habitats des animaux. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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