
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>modifier utilisateur </title>
</head>
<body>
<form id=userForm  method="POST"  action="/edit_user/<?php echo $User['username'] ?>" class="m-5 py-3" >
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
</html