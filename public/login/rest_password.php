<?php
include '../includes/database.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-css -->
    <link rel="stylesheet" href="app.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/Libre/Bootstraps/CSS/bootstrap.min.css">
    <title>forgor_password</title>
</head>
<body>
<div class="card bg-glass">
    <div class="card-body px-4 py-5 px-md-5">
        <form method="post"> 
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" >Mot de passe</label>
                        <input type="password" name="password" class="form-control" />
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" >Mot de passe</label>
                        <input type="password" name="password" class="form-control" />
                    </div>

                    <!-- Submit button -->
                    <button type="submit" name="rest" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-block mb-4">
                        réinitialiser
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
