<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>employé</title>
</head>

<body>
    <nav class="navbar fixed-top navbar-light bg-light flex-md-nowrap p-0 shadow ">
        <div class=" d-flex align-items-center">
        <!-- Toggle Button -->
        <button id="toggle-btn" class="btn btn-warning " onclick="toggleSidebar()"> <i class="fas fa-bars"></i></button>
        <a class="navbar-brand col-sm-3 col-md-2 py-2 px-5" href="admin.php"> Admin</a>
        </div>
        <input id="searchInput" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
            <a class="nav-link" href="/logout">Déconnexion</a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <nav class="nav flex-column p-4 mt-5 ">
            <a class="navbar-brand col-sm-3 col-md-2 py-2 px-5" href="">Employé</a>
            <h3 class="text-center mt-3"><?php echo $_SESSION['nom']; ?></h3>
            <span class="text-center mb-3"><?php echo $_SESSION['username']; ?></span>

            <a href="../Accuiel" class="nav-link d-flex align-items-center">
                <i class="fas fa-home"></i>
                <span class="ms-2 nav-link-text">Home</span>
            </a>

            <a href="#animals" class="nav-link d-flex align-items-center">
                <i class="fas fa-paw"></i>
                <span class="ms-2 nav-link-text">Animals</span>
            </a>
            <a href="#avis" class="nav-link d-flex align-items-center">
                <i class="fas fa-star"></i>
                <span class="ms-2 nav-link-text">Avis</span>
            </a>
            <a href="#messages" class="nav-link d-flex align-items-center">
                <i class="fas fa-message"></i>
                <span class="ms-2 nav-link-text">Messages</span>
            </a>
            
        </nav>
    </div>

    <!-- Main Content -->
    <div id="mainContent" class="main-content mt-3">
        <h2>Dashboerd</h2>
        <p>This is the main content of the page.</p>
        <!-- afficher le graphique de poids des animaux -->

        <div class="chart-container">

            <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
        </div>
        <!-- tableaux nouriture des animaux -->

        <section id=animals>
            <table class="table table-striped ">
                <thead class="table-dark">
                    <tr>
                        <th>Animale</th>
                        <th>Nouriture</th>
                        <th>Quantité</th>
                        <th>Date </th>
                        <th>Heure </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    ?>
                    <tr>
                        <?php foreach ($foods as $food) { ?>
                            <td><?php echo htmlspecialchars($food['animal_nom']) ?></td>
                            <td><?php echo htmlspecialchars($food['foodType']) ?></td>
                            <td><?php echo htmlspecialchars($food['quantite']) ?></td>
                            <td><?php echo htmlspecialchars($food['Date']) ?></td>
                            <td><?php echo htmlspecialchars($food['Heure']) ?></td>

                            <td>
                                <a href="/deleteFood/<?= $food['id_food'] ?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer ?')" id="sup" class="btn btn-danger btn-sm">Supprimer</i></a>
                                <a href="/edit_food/<?= $food['id_food'] ?>" id="sup" class="btn btn-success btn-sm">Editer</i></a>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <button id="animalBtn" class=" btn btn-warning mb-3 ">
                <a href="../add_food"> Ajouter </a>
            </button>
        </section>

        <!-- Gérer l'avis des visiteurs -->
        <section id="Avis" >
            <h2 class="text-success pb-3 border-bottom">Avis des visiteurs</h2>
            <div class="row">
                <?php if (!empty($avisEnAttente)) : ?>
                    <?php foreach ($avisEnAttente as $avis) : ?>
                        <div class=" col-lg-4 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title text-primary"><?= htmlspecialchars($avis['pseudo']) ?></h5>
                                    <p class="card-text text-muted"><?= htmlspecialchars($avis['commentaire']) ?></p>
                                    <div class="d-flex justify-content-between">
                                        <a href="validerAvis/<?= urlencode($avis['avis_id']) ?>" class="btn btn-success btn-sm">Valider</a>
                                        
                                        <a href="deleteAvis/<?=$avis['avis_id']  ?>" class="btn btn-danger btn-sm">Supprimer</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-muted">Aucun avis en attente de validation.</p>
                <?php endif; ?>
            </div>
        </section>


        <!-- gérer les messages des visiteur -->
    <section id="messages" class=" my-5">
        <h2 class="text-success mb-4">Messages de contact</h2>
        <div class="row g-3 p-3">
            <?php foreach ($messages as $message) { ?>
                <div class=" col-12 col-md-6 col-lg-4"> 
                    <div class="card h-100">
                        <div class="card-header">
                            <?php echo htmlspecialchars($message['titre']); ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Email: <?php echo htmlspecialchars($message['email']); ?></h5>
                            <p class="card-text">Message: <?php echo htmlspecialchars($message['description']); ?></p>
                            <a href="mailto:<?php echo $message['email']; ?>" class="btn btn-warning">Répondre</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/js/admin.js"></script>

</body>
</body>

</html>