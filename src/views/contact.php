
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style css bootstrap -->
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">

    <!-- style css -->
    <link rel="stylesheet" href="../Assets/css/Accueil.css">
    <link rel="stylesheet" href="../Assets/css/contact.css">
    <!-- font aweson  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="../images/fiveicon.png">

    <title>Contact</title>
</head>

<body>
    <header>
        <?php include_once __DIR__ .'/includes/navbar.php';?>
        
    </header>
    <main class=" pt-5 m-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-success text-white"><i class="fa fa-envelope"></i> Contact nous.
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="titre">un titre</label>
                                    <input type="text" class="form-control" name="titre" id="name" aria-describedby="emailHelp" placeholder="titre de vitre demande" required>
                                    <span class=" text-danger" id="text_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input id="email" type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="email@gmail.com" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                    <span class=" text-danger" id="email_error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="message">Description</label>
                                    <textarea class="form-control" id="description" rows="6" name="description" required></textarea>
                                    <span class=" text-danger" id="description_error"></span>
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-warning text-right">Envoyer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Addresse</div>
                        <div class="card-body">
                            <p>1795 Rte de Montoison</p>
                            <p>26120 bourdaux</p>
                            <p>France</p>
                            <p>Email : jose@zooarcadia.com</p>
                            <p>Tel. +33 12 56 11 51 84</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer class="footer ">
    <?php include_once __DIR__ .'/includes/footer.php';?>
        
    </footer>
    <!-- script-bootstrap js  -->
    <script src="../Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- script js -->
    <script src="../Assets/js/contact.js"></script>


</body>

</html>