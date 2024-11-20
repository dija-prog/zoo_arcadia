<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-css -->
    <link rel="stylesheet" href="../Assets/css/style.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <title>navbar</title>
</head>

<body>
    <header>
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg  fixed-top ">
            <div class="container-fluid">
                <a class="navbar-brand me-5 " href="../Accueil.php">
                    <img src="../images/LOGOZOO.png" width="100" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-center " id="navbarNav">
                    <ul class="navbar-nav mb-2 ">
                        <li class="nav-item ">
                            <a class="nav-link" href="../Nos-animaux/animals.php"  role="button" aria-expanded="false">
                                Nos animaux
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../Nos-animaux/habitat.php" role="button" aria-expanded="false">
                                Habitat
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../service.php"  role="button" aria-expanded="false">
                                Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../contact.php"  aria-expanded="false"> Contact </a>
                        </li>

                    </ul>
                </div>
                <button class="btn btn-success ms-4 ">
                    <a data-mdb-dropdown-init href="../login/connexion.php" role="button"  id="navbarNav aria-expanded="false">
                        <i class="fas fa-user"></i> connexion
                    </a>
                </button>
            </div>
        </nav>
    </header>






    <!-- script-bootstrap js  -->
    <script src="../Assets/Bootstraps/js/bootstrap.bundle.min.js"></script>
    <!-- script js -->
    <script src="../Assets/js/app.js"></script>
    <script src="../Assets/js/admin.js"></script>
</body>

</html>