<?php 
include('./includes/database.php');

require('./vendor/autoload.php');

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
    //Vérifier si les champs sont valides 

        if (!$email){
            echo "l'email fourni est invalide.";
            exit;
        }
        if(empty($titre)|| empty($description) ){
            echo "Le titre et le message doivent êtr remplis.";
            exit;
        }

        $stmt = $bdd->prepare("INSERT INTO contact (titre,email,description) VALUES (?,?,?)");
        if ($stmt->execute(array($titre,$email,$description))){
            echo "ajout réussie";
        
        try{
                $transport = Transport::fromDsn('smtp://aithamouk94@gmail.com:oxmnrtkoxgyborja@smtp.gmail.com:587');
                $mailer = new Mailer($transport);

                $email = (new Email())
                    ->from($email)
                    ->to('aithamouk94@gmail.com')
                    ->subject('Nouvelle demande de contact:'.$titre)
                    ->text($description);

                $mailer->send($email);


                echo 'Email envoyé avec succès';
                
            } catch (Exception $e){
                echo 'Erreur lors de l\'envoie de l\'email:', $e->getMessage();
                echo 'code d\'erreur:'. $e->getCode();
            }
        }else{
            echo"Erreur lors dans la base de données.";
        }
    }


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style css bootstrap -->
    <link rel="stylesheet" href="./Assets/Bootstraps/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="./Assets/css/contact.css">
    <!-- font aweson bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title>Contact</title>
</head>
<body>
    <header>
        <?php
            require('./includes/navbar.php');
        ?>
    </header>
    <main class="m-5 p-5">
        <div class="container">
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
                                <button type="submit" class="btn btn-warning text-right">Envoyer</button></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Addresse</div>
                        <div class="card-body">
                            <p>3 rue des Champs Elysées</p>
                            <p>75008 PARIS</p>
                            <p>France</p>
                            <p>Email : email@example.com</p>
                            <p>Tel. +33 12 56 11 51 84</p>
        
                        </div>
        
                    </div>
                </div>
            </div>
        </div>

    </main>
    <?php
    require('./includes/footer.php');
    ?>
    <script src="./Assets/Bootstraps/js/bootstrap.bundle.min.js" ></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
</body>
</html>