<?php
include('./includes/database.php');

require('./vendor/autoload.php');

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    //Vérifier si les champs sont valides 

    if (!$email) {
        echo "l'email fourni est invalide.";
        exit;
    }
    if (empty($titre) || empty($description)) {
        echo "Le titre et le message doivent êtr remplis.";
        exit;
    }

    $stmt = $bdd->prepare("INSERT INTO contact (titre,email,description) VALUES (?,?,?)");
    if ($stmt->execute(array($titre, $email, $description))) {
        echo "ajout réussie";

        try {
            $transport = Transport::fromDsn('smtp://aithamouk94@gmail.com:oxmnrtkoxgyborja@smtp.gmail.com:587');
            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from($email)
                ->to('aithamouk94@gmail.com')
                ->subject('Nouvelle demande de contact:' . $titre)
                ->text($description);

            $mailer->send($email);


            echo 'Email envoyé avec succès';
        } catch (Exception $e) {
            echo 'Erreur lors de l\'envoie de l\'email:', $e->getMessage();
            echo 'code d\'erreur:' . $e->getCode();
        }
    } else {
        echo "Erreur lors dans la base de données.";
    }
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style css bootstrap -->
    <link rel="stylesheet" href="./Assets/bootstrap/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="./Assets/css/contact.css">
    <!-- font aweson  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="./images/fiveicon.png">

    <title>Contact</title>
</head>

<body>
    <header>
        <!-- navbar start -->
        <nav class="navbar navbar-expand-sm  fixed-top ">
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
        <!-- end navbar  -->
    </header>
    <main class="mt-5 pt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-success text-white"><i class="fa fa-envelope"></i> Contact nous.
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="form-group">
                                    <label for="titre">un titre</label>
                                    <input type="text" class="form-control" name="titre" id="name" aria-describedby="emailHelp" placeholder="titre de vitre demande" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="email@gmail.com" required>
                                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                </div>
                                <div class="form-group">
                                    <label for="message">Description</label>
                                    <textarea class="form-control" id="description" rows="6" name="description" required></textarea>
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
    <script src="./Assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- script js -->
    <script src="./Assets/js/Accueil.js"></script>

</body>

</html>