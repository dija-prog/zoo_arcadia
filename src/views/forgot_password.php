
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-css -->
    <link rel="stylesheet" href="../Assetes/css/connexion.cs">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <title>forgot_password</title>
</head>
    <body>
        <div class="page-wrap d-flex flex-row align-items-center mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 ">
                        <img src="../Assets/images/LOGOZOO.png" class="img-fluid rounded-circle shadow-sm" alt="logo" />
                    </div>
                    <div class="col-md-9 mt-5">
                        <h3 class="font-weight-light">Mot de passe oublié ?</h3>
                        <form method="post" action="/forgot_password">
                            <input name="username" class="form-control form-control-lg" type="email" placeholder="Votre adresse email" required />
                            <div class="text-right my-3 mt-5">
                                <button type="submit" class="btn btn-lg btn-success ">Réinitialiser</button>
                            </div>
                        </form>
                        <?php if (isset($message)) : ?>
                            <p class="alert alert-info"><?= htmlspecialchars($message) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>