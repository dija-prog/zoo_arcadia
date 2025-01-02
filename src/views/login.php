<?php

// if (isset($_POST['valider'])) {

//   if (!empty($_POST['username']) && !empty($_POST['password'])) {

//     // Connexion à la base de données
//     try {
//       $bdd = new PDO('mysql:host=localhost;dbname=zoo arcadia', 'root', '');
//       $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     } catch (Exception $e) {
//       die('Erreur : ' . $e->getMessage());
//     }

//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     // Préparer la requête SQL
//     $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE username = ?');
//     $recupUser->execute(array($username));

//     if ($recupUser->rowCount() > 0) {
//       $User = $recupUser->fetch(PDO::FETCH_ASSOC);

//       $hash = $User['password'];
//       // var_dump($User);  // Vérifier ce qui est récupéré
//       // var_dump($password); // Vérifier ce qui est saisi
//       // var_dump($hash); // Vérifier ce qui est saisi
//       // Vérifier si le mot de passe correspond
//       if (password_verify($password, $hash)) {
//         echo "vous etez connecter";
//         $role_id = $User['role_id'];
//         // Stocker les informations dans la session
//         session_start();
//         $_SESSION['username'] = $User['username'];
//         $_SESSION['role'] = $role_id;
//         $_SESSION['prenom'] = $User['prenom'];
//         $_SESSION['nom'] = $User['nom'];
//         // Rediriger selon le rôle
//         define('ADMIN', 1);
//         define('EMPLOYE', 2);
//         define('VETERINAIRE', 3);
//         if ($role_id == ADMIN) {
//           header("Location: ../roles/admin.php");
//         } elseif ($role_id == EMPLOYE) {
//           header("Location: ../roles/employé.php");
//         } elseif ($role_id == VETERINAIRE) {
//           header("Location: ../roles/vétérinaire.php");
//         }
//       } else {
//         echo "Votre mot de passe est incorrect !";
//       }
//     } else {
//       echo "Votre username ou le rôle est incorrect !";
//     }
//   } else {
//     echo "Veuillez remplir tous les champs !";
//   }
// }



// $password = 'jose_arcadia';
// $hashedPassword = password_hash('Jose_arcadia', PASSWORD_DEFAULT);
// echo "Le hash du mot de passe est : " . $hashedPassword;


?>


<!-- // Mot de passe à hacher
$motDePasse = 'Jose_arcadia'; -->

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- style-css -->
  <link rel="stylesheet" href="../Assets/css/connexion.css">
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="/images/fiveicon.png">
  <title>connexion</title>
</head>

<body>
  <section id="connexion" class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="/images/calao1.jpg"
            alt="Login image" class="w-100 vh-100">
        </div>

        <div class=" login col-sm-6 text-black ">

          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4  pt-4 pt-xl-0 mt-xl-n5">
            <form method="POST" action="/login">
              <div class="back text-success fw-bold d-flex justify-content-start mt-4">
                <a href="./Accueil"><i class="fa-solid fa-house "></i>Accueil</a>
              </div>
              <h3 class=" conx fw-bold mt-5 mb-3 pb-3 ms-xl-4 ">Connexion</h3>

              <div data-mdb-input-init class="form-outline text-dark mb-4">
                <label class="form-label">Email</label>
                <input name="username" type="email" placeholder="exemple@gmail.fr" class="form-control form-control-lg" />
              </div>

              <div data-mdb-input-init class="form-outline text-dark mb-4">
                <label class="form-label">Mot de passe</label>
                <input name="password" type="password" placeholder="mot de passe" class="form-control form-control-lg" />
              </div>

              <div class="pt-1 mb-3 ">
                <input type="submit" name="valider" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg btn-block" type="button" />
              </div>
              <p class="small mb-3 pb-lg-2"><a class="text-muted" href="forgot_password.php">Mot de passe oublié?</a></p>
              <p>Vous avez pas de compte? <a href="./register" class="link-success">inscription ici</a></p>

            </form>

          </div>

        </div>
      </div>
    </div>
  </section>

</body>

</html>