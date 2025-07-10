<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/service.css">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="./images/fiveicon.png">
    <title>Services</title>
</head>

<body>
    <header id="restaurant">
        <?php include_once __DIR__ . '/includes/navbar.php'; ?>
        <div class="cover">
            <div class=" carousel-caption row  d-flex align-items-center justify-content-center mb-5 py-5 ">
                <h1 class="mb-4"> Où manger ?</h1><br>
                <h2 class="mt-3"> Venez vous manger dans un lieu pour se détendre et savourer </h2>
            </div>
            <img src="./images/grue_couronée2.jpg" class=" d-block w-100 img-fluid" alt=grue_couronée>
        </div>
    </header>
    <main>
        <div class="ser container-fluid text-white  ">
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
                <div class="col-12 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/poussette.jpg" class="card-img-top" alt="poussette">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-warning">Location des poussettes</h5>
                            <p class="card-text text-white">Pour le confort des plus petits, profitez de notre service de location de poussettes à l'entrée du zoo. Une solution pratique pour une journée en famille sans souci..</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="./images/tarin.jpg" class="img-fluid " alt="Train">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-warning">Petit train</h5>
                            <p class="card-text text-white">Découvrez le zoo autrement à bord de notre petit train ! Une manière relaxante et ludique de parcourir le parc tout en profitant d'une vue panoramique sur les habitats des animaux. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <?php require_once __DIR__ . "/includes/footer.php" ?>
    </footer>
</body>

</html>