<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/Accueil.css">
    <title>navbar</title>
</head>

<body>
    <header>
        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg fixed-top  ">
            <div class="container-fluid">
                <a class="navbar-brand me-5 " href="/Accueil">
                    <img src="../images/LOGOZOO.png" width="100" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav mb-2 me-auto mb-lg-0 ">
                        <li class="nav-item ">
                            <a class="nav-link" href="/animals" >Nos animaux</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/habitat" > Habitat</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="/service">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/contact"> Contact </a>
                        </li>
                    </ul>
                </div>

                <a href="/login" class="btn btn-success ms-4  "><i class="fas fa-user"></i> connexion</a>
            </div>
        </nav>

    </header>


    <!-- script-bootstrap js  -->
    <script src="../Assets/Bootstraps/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.min.js"></script>
    <!-- script js -->
    <script src="../Assets/js/admin.js"></script>
</body>

</html>