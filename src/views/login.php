
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
          <div class="d-flex align-items-center px-5 ms-xl-4  pt-4 pt-xl-0 mt-xl-n5">
            <form id="login-form" method="POST" action="/login">
              <div class="back text-success fw-bold d-flex justify-content-start mt-4">
                <a href="./Accueil"><i class="fa-solid fa-house "></i>Accueil</a>
              </div>
              <h3 class=" conx fw-bold mt-5 mb-3 pb-3 ms-xl-4 ">Connexion</h3>
              <div class=" text-dark mb-4">
                <label class="form-label">Email</label>
                <input id="email" name="username" type="email" placeholder="exemple@gmail.fr" class="form-control form-control-lg" value="<?php echo isset($_COOKIE['username']) ? htmlspecialchars($_COOKIE['username']) : ''; ?>"  required/>
                <span class="text-danger" id="email_error"></span>
              </div>

              <div  class=" text-dark mb-4">
                <label class="form-label">Mot de passe</label>
                <input id="password" name="password" type="password" placeholder="mot de passe" class="form-control form-control-lg" required/>
                <span class="text-danger" id="password_error"></span>
              </div>

              <!-- Case à cocher "Se souvenir de moi" -->
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" />
                <label class="form-check-label" for="remember">
                  Se souvenir de moi
                </label>
              </div>

              <div class="pt-1 mb-3 ">
                <input type="submit" name="valider"  class="btn btn-warning btn-lg btn-block" type="button" />
              </div>
              <!-- liens  -->
              <p class="small mb-3 pb-lg-2"><a class="text-muted" href="./forgot_password">Mot de passe oublié?</a></p>
              <p>Vous avez pas de compte? <a href="./register" class="link-success">inscription ici</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="../Assets/js/login.js"></script>

</body>

</html>