<?php
include_once('../includes/database.php');
    
    // mdifier l'utilisateur 

if (isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role =intval($_POST['role_id']);
    
        // on prépare la requéte update 
    
    $req = $bdd->prepare("UPDATE utilisateur SET nom = :nom, prenom = :prenom, password = :password, role_id =:role  WHERE username = :username");

    
    $req->bindParam(':prenom',$prenom, PDO::PARAM_STR);
    $req->bindParam(':nom',$nom, PDO::PARAM_STR);
    $req->bindParam(':password',$password, PDO::PARAM_STR);
    $req->bindParam(':username',$username, PDO::PARAM_STR);
    $req->bindParam(':role',$role, PDO::PARAM_INT);

    $request = $req->execute();
    
    try{
        if ($request == true){
            echo"L'utilisateur à été modifié avec succés";
        }else{
            echo "Echec"; 
        }
    } catch (PDOException $e) {
        echo "Erreur de la mise à jour :" . $e->getMessage();
    }
    header("Location: ../roles/admin.php#usertable");
    exit();
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>modifier utilisateur </title>
</head>
<body>
    <!-- form pour mdifier un user -->
    <?php
    if(isset($_GET['username'])){

        $username = $_GET['username'];
    
        // on récupére le contenue de la table utilisateur 
        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE username = ?');
        $recupUser->execute(array($username));
        
        $User = $recupUser->fetch(PDO::FETCH_ASSOC);
    }
    ?>

    <form id=userForm method="POST"  class="m-5 py-3" >
        <h4 class="text-success">Modifier l'utilisateur</h4>
        <div class="mb-3">
        
            <label class="form-label">Nom</label>
            <input type="text" name="nom" value="<?=$User['nom'] ?>"  class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Prenom</label>
            <input type="text" name="prenom" value="<?=$User['prenom']?>"  class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Email address</label>
            <input  type="email" name="username" value="<?=$User['username'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label  class="form-label">Password</label>
            <input  type="password" name="password" value="<?=$User['password'] ?>" class="form-control" >
        </div>
        <select  name="role_id" class="form-select mb-3" aria-label="Default select example">
            <option  value="2" <?=$User['role_id']== 2 ? 'selected': '' ?>>Employé</option>
            <option  value="3" <?=$User['role_id']== 3 ? 'selected': '' ?>>Véterenaire</option>
        </select>
        <button type="submit"  name="submit" class="btn btn-success">Modifier</button>
    </form>


    <script src="../Assets/Bootstraps/js/bootstrap.bundle.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>