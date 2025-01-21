
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-css -->
    <link rel="stylesheet" href="../Assets/css/app.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <title>Réinitialisation du mot de passe</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card bg-glass shadow-lg" style="max-width: 500px; width: 100%;">
            <div class="card-body px-4 py-5">
                <h3 class="text-center mb-4">Réinitialisation du mot de passe</h3>
                <form method="post" action="/reset_password/<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">

                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
                    <!-- Champ pour le nouveau mot de passe -->
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Nouveau mot de passe</label>
                        <input type="password"  id="password" name="password" class="form-control"  minlength="8" placeholder="Entrez un nouveau mot de passe" required />
                    </div>

                    <!-- Champ pour confirmer le mot de passe -->
                    <div class="form-outline mb-4">
                        <label for="confirm-password" class="form-label">Confirmez le mot de passe</label>
                        <input type="password" id="confirm-password" name="confirm_password" class="form-control" minlength="8" placeholder="Confirmez le mot de passe"  required />
                    </div>

                    <!-- Message d'erreur -->
                    <div id="error-message" class="text-danger mb-3" style="display: none;">Les mots de passe ne correspondent pas.</div>


                    <!-- Bouton pour soumettre le formulaire -->
                    <button type="submit" name="reset" class="btn btn-warning btn-block">Réinitialiser</button>

                    <!-- Protection CSRF -->
                    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken) ?>" />
                    
                </form>
            </div>
        </div>
    </div>

    <script src="../Assets/js/login.js"></script>>
</body>
</html>
