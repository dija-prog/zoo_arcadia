<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !='3'){
    header('location:connexion.php');
    exit;
}
 echo 'Bienvenue,' . $_SESSION['username'] . "! vous êtes sur la page de vétérinaire. "
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace véternaire </title>
    <link rel="stylesheet" href="../Assets/css/vétérinaire.css">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">

</head>
<body>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Vétérinaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="sidebar">
        <!-- Bouton pour ouvrir la Sidebar -->
    <div class="container-fluid">
        <button class="btn btn-primary mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            Menu
        </button>
    </div>

    <!-- Sidebar Offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarLabel">Espace Vétérinaire</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-brand">
                <div class="brand-flex">
                    <img src="../images/LOGOZOO.png" width="50px" height="30px" alt="logo">
                    <div class="brand-icons">
                        <span class="las la-bell"></span>
                    </div>
                </div>
            </div>


            <div class="sidebar-user">
                <img src="default_profile.jpg" alt="photo de profil">
                <div>
                    <h3><?php echo $_SESSION['nom']; ?></h3>
                    <span><?php echo $_SESSION['username']; ?></span>
                </div>

            <!-- Formulaire pour uploader une photo de profil -->
            <div class="file-upload mt-4">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="fileToUpload" class="form-label">Télécharger une photo de profil :</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*" class="form-control mb-2">
                    <input type="submit" value="Uploader l'image" name="submit" class="btn btn-primary">
                </form>
            </div>


            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#compte-rendus">Comptes Rendus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#habitats">Habitats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alimentation">Informations Alimentaires</a>
                </li>
            </ul>

        </div>
    </div>
</nav>



    <!-- Contenu Principal -->
    <div class="content container mt-4">
        <h1>Bienvenue dans votre Espace Vétérinaire</h1>
        <p>Vous pouvez naviguer dans votre espace à l'aide du bouton "Menu".</p>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<link rel="stylesheet" href="../Assets/Bootstraps/js/bootstrap.bundle.js">
</body>
</html>