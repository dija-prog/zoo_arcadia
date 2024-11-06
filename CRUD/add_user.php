
<?php
include_once('../includes/database.php');
include '../vendor/autoload.php';
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;

    if ($_SERVER["REQUEST_METHOD"] === "POST"){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $username = $_POST['username'];
        $role =$_POST['role_id'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $stmt = $bdd->prepare("INSERT INTO utilisateur (nom,prenom,username,password,role_id) VALUES (?,?,?,?,?)");
    if ($stmt->execute(array($nom,$prenom,$username,$password,$role))){
        echo "inscription réussie";
        $transport = Transport::fromDsn('smtp://aithamouk94@gmail.com:oxmnrtkoxgyborja@smtp.gmail.com:587');
        $mailer = new Mailer($transport);

        $email = (new Email())
            ->from('aithamouk94@gmail.com')
            ->to($username)
            ->subject('ajouter un utilisateur')
            ->text('Bonjour votre compte à été  bien creé vous pouvez récuperer auprés de l/administrateur ');

        $mailer->send($email);


        echo 'Email envoyé avec succès';
        header('location: ../roles/admin.php#usertable');
    }
    }else{
        echo "erreur d'inscription";
    } 
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">;
        <title>Document</title>
    </head>
    <body>

    <!-- form pour ajouter un user -->
    <div id="fromUser" class="container mt-5 ">
          <form method="POST" class="row g-3 align-items-center">
            <h4 class="text-success">Ajouter un utilisateur</h4>

            <div class="col-md-3">
              <label for="nom" class="form-label">Nom</label>
            </div>
            <div class="col-md-9">
              <input type="text" name="nom"   class="form-control" >
            </div>

            <div class="col-md-3">
              <label for="prenom" class="form-label">Prenom</label>
            </div>
            <div class="col-md-9">
              <input type="text" name="prenom" class="form-control" >
            </div>

            <div class="col-md-3">
              <label  class="form-label">Email address</label>
            </div>
            <div class="col-md-3">
              <input type="email" name="username" class="form-control">
            </div>

          <div class="col-md-3">
            <label for="Password" class="form-label">Password</label>
          </div>
          <div class="col-md-9">
            <input type="password" name="password" class="form-control" >
          </div>

          <div class="col-md-3">
            <label for="role-id"  class="form-control" > Rôle</label>
          </div>

          <div class="col-md-9">
            <select  name="role_id" id="role-id" class="form-select mb-3" aria-label="Default select example">
              <option value="2">Employé</option>
              <option value="3">Véterenaire</option>
            </select>
          </div>
          
          <button type="submit" class="btn btn-Success">Envoyer</button>
        </form>
      </div>
      <!-- from add user end -->
        
    </body>
    </html>
