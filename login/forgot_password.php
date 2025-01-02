<?php
// connexion à la base de données
include '../includes/database.php';
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    // vérifier si l'email existe
    $query = "SELECT * FROM utilisateur WHERE username = '$username'";
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':username', $username);
    // $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    // si l'utlisateur existe 
    if($result->num_rows > 0) {
        // générer un token
        $token = bin2hex(random_bytes(15));
        // enregistrer le token dans la base de données
        $update_query = "UPDATE utilisateur SET rest_token = ?, rest_token_expire = DATE_ADD(NOW(), INTERVAL 15 MINUTE) WHERE username = ?";
        $stmt = $bdd->prepare($update_query);
        $stmt->bindParam("ss", $token, $username);
        $stmt->execute();
        // envoyer un email à l'utilisateur
        $rest_link = "http://localhost/espace%20utilisateurs/reset_password.php?token=" . $token;
        $subject = "Réinitialisation de mot de passe";
        $message = "Cliquez sur ce lien pour réinitialiser votre mot de passe: $rest_link";mail($username, $subject, $message);
        echo "Un lien de réinitialisation de mot de passe a été envoyé à votre email.";
    } else {
        echo "Cet email n'existe pas.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-css -->
    <link rel="stylesheet" href="./connexion.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/Bootstraps/CSS/bootstrap.min.css">
    <title>forgor_password</title>
</head>
<body>
    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="https://via.placeholder.com/190x190.png?text=logo" class="img-fluid rounded-circle shadow-sm" alt="" />
                </div>
                <div class="col-md-9">
                    <h2 class="font-weight-light">Forgot your password?</h2>
                    Not to worry. Just enter your email address below and we'll send you an instruction email for recovery.
                    <form target="_blank" action="" class="mt-3">
                        <input class="form-control form-control-lg" type="email" placeholder="Your email address"/>
                        
                        <div class="text-right my-3">
                            <button type="submit" class="btn btn-lg btn-success">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>