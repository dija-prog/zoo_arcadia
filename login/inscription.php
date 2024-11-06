<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=zoo arcadia','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['Inscrire'])){ 

    if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['role_id'])){
        
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $username = htmlspecialchars($_POST['username']);
        $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
        $role_id = htmlspecialchars($_POST['role_id']);
        // Vérifier que le rôle sélectionné n'est pas admin
        $checkrole = $bdd->prepare("SELECT nom_role FROM role WHERE role_id = ?");
        $checkrole->execute(array($role_id));
        $role = $checkrole->fetch(PDO::FETCH_ASSOC);

        if($role['nom_role'] == 'admin'){
            echo "Vous ne pouvez pas vous inscrire en tant qu'admin !";
            exit;
        }else{
          // Insertion des données dans la base de données
        $insertUser = $bdd->prepare("INSERT INTO utilisateur (prenom, nom, username, password, role_id) VALUES(?,?,?,?,?)");
        if($insertUser->execute(array($prenom, $nom, $username, $hash, $role_id))){ 
            echo "Inscription réussie !";
            header("Location: connexion.php ");
            exit; // Arrêter l'exécution après redirection
        } else {
            echo "Erreur lors de l'inscription.";
        }
      }
    } else {
        echo "Veuillez compléter tous les champs...";
    }
}
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Assets/css/app.css">
    <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
  <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
  <title>Inscription</title>
</head>
<body>
<section  id="register" class="overflow-hidden">
  <div class="container px-4 py-5 px-md-4 text-center text-lg-start my-3">
    <div class="title row gx-lg-5 align-items-center mb-5">
      <div class=" title1  col-lg-6 mb-3 mb-lg-0">
        <a  href="../Accuiel.php">Accueil</a>
        <h1 class=" h1 my-5 display-5 fw-bold" >
          S'inscrire <br />
          <span> au Zoo Arcadia</span>
        </h1>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-4 py-5 px-md-5">
              <form method="post"> 
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label"> Prénom</label>
                    <input type="text" name="prenom" class="form-control" />
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" >Nom</label>
                    <input type="text" name="nom" class="form-control" />
                  </div>
                </div>
              </div>
              <!-- select user input -->
              <select name="role_id" class="form-select mb-4" aria-label="Default select example">
                <option value="">quel est votre rôle?</option>
                <?php

                $roles = $bdd->query("SELECT * FROM role WHERE role_id !='1'")->fetchAll();
                  foreach($roles as $role){
                  ?>
                  <option value="<?php echo $role['role_id'] ?>"><?php echo htmlspecialchars($role['nom_role']);?></option>
                <?php
                }
                ?>

              </select>
              

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" >username </label>
                <input type="text" name="username" class="form-control" />
              </div>

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" >Mot de passe</label>
                <input type="password" name="password" class="form-control" />
              </div>


              <!-- Submit button -->
              <button type="submit" name="Inscrire" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block mb-4">
                Inscrire
              </button>

              <!-- Register buttons -->
              <div class="text-center">
                <p>ou inscrire avec:</p>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-github"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>



