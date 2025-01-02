<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">;
    <title>addUserForm</title>
</head>
<body>

    <!-- form pour ajouter un user -->
    <div class="container-fluid d-flex justify-content-center">
        <div id="fromUser" class="container mt-5 ">
            <form method="POST" action="../admin.php" class="row g-3 align-items-center">
                <h4 class="text-success">Ajouter un utilisateur</h4>
    
                <div class="col-md-3">
                    <label for="nom" class="form-label">Nom</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="nom" class="form-control">
                </div>
    
                <div class="col-md-3">
                    <label for="prenom" class="form-label">Prenom</label>
                </div>
                <div class="col-md-9">
                    <input type="text" name="prenom" class="form-control">
                </div>
    
                <div class="col-md-3">
                    <label class="form-label">Email address</label>
                </div>
                <div class="col-md-3">
                    <input type="email" name="username" class="form-control">
                </div>
    
                <div class="col-md-3">
                    <label for="Password" class="form-label">Password</label>
                </div>
                <div class="col-md-9">
                    <input type="password" name="password" class="form-control">
                </div>
    
                <div class="col-md-3">
                    <label for="role-id" class="form-control"> Rôle</label>
                </div>
    
                <div class="col-md-9">
                    <select name="role_id" id="role-id" class="form-select mb-3" aria-label="Default select example">
                        <option value="2">Employé</option>
                        <option value="3">Véterenaire</option>
                    </select>
                </div>
    
                <button type="submit" class="btn btn-Success">Envoyer</button>
            </form>
        </div>
    </div>
</body>

</html>