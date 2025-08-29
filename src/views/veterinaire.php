
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/veternaire.css">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Espace véternaire </title>

</head>

<body>
    <header>


        <nav class="sidebar">
            <!-- Bouton pour ouvrir la Sidebar -->
            <div class="container-fluid">
                <button class="btn btn-success  mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                    Menu
                </button>
            </div>

            <!-- Sidebar Offcanvas -->
            <div class="offcanvas offcanvas-start bg-success text-white " tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title text-warning" id="sidebarLabel">Espace Vétérinaire</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="sidebar-user">
                        <div class="text-center mt-4">
                            <h3><?php echo $_SESSION['nom']; ?></h3>
                            <span><?php echo $_SESSION['username']; ?></span>
                        </div>
                    </div>
                    <div class="nav flex-column p-4 mt-5 ">
                        <a href="/Accueil" class="nav-link d-flex align-items-center">
                            <i class="fas fa-home"></i>
                            <span class="ms-2 nav-link-text">Accueil</span>
                        </a>
                        <a href="#habitat" class="nav-link d-flex align-items-center">
                            <i class="fas fa-user"></i>
                            <span class="ms-2 nav-link-text">Habitat</span>
                        </a>
                        <a href="#food" class="nav-link d-flex align-items-center">
                            <i class="fas fa-paw"></i>
                            <span class="ms-2 nav-link-text">La nouriture d'animale</span>
                        </a>
                        <a href="#Rapport" class="nav-link d-flex align-items-center">
                            <i class="fas fa-notes-medical"></i>
                            <span class="ms-2 nav-link-text">Rapport véternaire</span>
                        </a>
                        <a href="/logout" class="nav-link d-flex align-items-center">
                            <i class="fas fa-right-from-bracket"></i>
                            <span class="ms-2 nav-link-text">Deconnexion</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <!-- Contenu Principal -->
        <div class="content container-fluid mt-4">
            <h2>Bienvenue dans votre Espace Vétérinaire</h2>
        </div>
        <section id="habitat" class="container-fluid ">
            <h3 class="text-center text-success fw-bold mt-5 ">Habitat</h3>
            <form method="POST" action='/veterinaire'>
                <div class="row justify-content-center">
                    <div class=" col-12 col-md-8 col-lg-6 py-4 ">
                        <label for="habitat-select" class="form-label">Choisissez un habitat</label>
                        <select name="habitat_id" required>
                            <?php foreach ($habitats as $habitat): ?>
                                <option value="<?= $habitat['habitat_id'] ?>"><?= $habitat['nom'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <div class="mb-3">
                            <label for="commentaire_habitat" class="form-label">commentaire</label>
                            <textarea class="form-control" name="commentaire" id="commentaire_habitat" rows="3" required></textarea>
                        </div>

                        <div class="form-group mb-4">
                            <label for="date"> Date:</label>
                            <input class="from-control" type="date" id="date" name="date_commentaire" rows="3" required>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-warning ">Soumettre</button>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <!-- nouriture de l'animal  -->
        <section id="food">
            <h2 class="text-center  text-success fw-bold mt-5 ">Suivi de la consommation de la nourriture des animaux</h2>
            <div class="container mt-4">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered ">
                        <thead class="thead table-dark">
                            <tr>
                                <td> Animale</td>
                                <td> Type de Nouriture</td>
                                <td> Quantite</td>
                                <td> Date</td>
                                <td> Heure</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($foods)) {
                                foreach ($foods as $food) { ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($food['animal_nom']) ?></td>
                                        <td><?php echo htmlspecialchars($food['foodType']) ?></td>
                                        <td><?php echo htmlspecialchars($food['quantite']) ?></td>
                                        <td><?php echo htmlspecialchars(isset($food['Date']) ? $food['Date'] : 'Non défini'); ?></td>
                                        <td><?php echo htmlspecialchars(isset($food['Heure']) ? $food['Heure'] : 'Non défini'); ?></td>
                                    </tr>
                            <?php }
                            } else {
                                echo "<tr><td colspan='5'> Aucune donné disponible.</td></tr>";
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- rapport vétérinaire -->
        <section>
            <h3 class="text-center  text-success fw-bold mt-5 "> Rapport vétérinaire</h3>
            <div class="text-center mt-5">
                <p> Click sur le bouton ci-dessous pou remplire votre rapport des animaux</p>
                <a href="/rapport"><button class="btn btn-warning mb-5">Remplire</button> </a>
            </div>
        </section>
    </main>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>