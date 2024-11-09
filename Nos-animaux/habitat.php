<?php
    require_once('../includes/database.php');
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style.css -->
    <link rel="stylesheet" href="../Assets/css/habitat.css">
    <!-- bootstrap.css -->
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Nos animaux </title>
</head>
<body>
  <header>
    <!-- navbar-start -->
      <nav class="navbar navbar-expand-lg  fixed-top ">
          <div class="container-fluid">
            <a class="navbar-brand " href="../Accuiel.php"><img src="../images/LOGOZOO.png" class="navbar-brand"  alt="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end " id="navbarNavDropdown">
              <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Préparez ma visite
                  </a>
                  <ul class="dropdown-menu  " aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="#"> Billet & Tarifs </a></li>
                    <li><a class="dropdown-item" href="#"> Restaurant& Boutiques </a></li>
                    <li><a class="dropdown-item" href="#"> Conseils de visite</a></li>
                    <li><a class="dropdown-item" href="#"> Services</a></li>
                  </ul>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link " href="../Nos-animaux/animal.php" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                    Nos Animaux
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="../contact.php"> Contact  </a>
                </li>

                <li class="nav-item ">
                <a data-mdb-dropdown-init class="nav-link" href="../login/connexion.php"  alt="login" id="navbarDropdown" role="button" aria-expanded="false">
                  <i class="fa-solid fa-user"></i>
                </a>
                </li>

                <li class="nav-item ">
                <a data-mdb-dropdown-init class="nav-link" href="../billeterie/billeterie.html"  alt="login" id="navbarDropdown" role="button" aria-expanded="false">
                  <i class="fa-solid fa-ticket-simple"></i>
                </a>
                </li>
              </ul>
            </div>
        </nav>
        <!-- navbar-end -->
        
        <div class="container-fluid mb-5 ">
          <div class="sub-title mb-5 p-5">
            <h1> Découvrez la diversité de nos animaux</h1>
            <P>provenant des quatre coins du monde : Afrique, Asie, et bien plus encore.</P>
          </div>
        </div>

  </header>
  <main>
        <!-- images  habitat -->

    <div class=" habitat container mt-5 p-5 ">
      <h2 class="text-center mb-5 text-success text-bold">Découvrez nos différents habitats</h2>
      
      <div class="row">
          <!-- Habitat savane -->
        <div class=" col-lg-4 col-md-6 col-12">
          <div class="image-container">
            <a class="buttonjs savane" href="#animals">
              <img src="../images/elephant.jpg" class="img-fluid" alt="savane">
              <div class="title-overlay" data-name="1">Savane Africane</div>
            </a>
          </div> 
        </div>
        <!-- Habitat jungle -->
        <div class=" col-lg-4 col-md-6 col-12">
          <div class="image-container">
            <a class="buttonjs jungle" href="#animals">
              <img src="../images/LE TIGRE.jpg" class="img-fluid" alt="jungle">
              <div class="title-overlay" data-name="2">Jungle Trpicale</div>
            </a>
          </div>
        </div>
        <!-- Habitat marais--> 
        <div class=" col-lg-4 col-md-6 col-12">
          <div class="image-container">
            <a class="buttonjs marais" href="#animals">
              <img src="../images/aligateur.jpg" class="img-fluid" alt="marais">
              <div class="title-overlay" data-name="3">Marais Humide</div>
            </a>
          </div>
        </div>
      </div>
    </div>
    
    <!-- images  habitat end -->
    
    
    <div id="animals" class="container">
      <!-- description habitat -->
        <div class="container mt-5">
          <div class="texts">
            <?php 
            $habitat = $bdd->query("select * from habitat")->fetchAll();
            foreach($habitat as $habitat):
            $nom = $habitat['nom']; 
            $description = $habitat['description'];      
            ?>
            <div class="text hide" data-name="<?php echo htmlspecialchars($habitat['habitat_id']) ?>"> 
              <h3 class="text-success "><?php echo htmlspecialchars($nom) ?></h3>
              <p class="description"><?php echo htmlentities($description) ?></p>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- description habita end -->
    

      
      <!-- animals card -->
      <div class="cards row row-cols-1 row-cols-md-4 g-3 p-5">
        <?php 
          $animals = $bdd->query("select * from animal")->fetchAll();
          foreach($animals as $animal) :
          $image = base64_encode($animal['image']);
        ?>
        <div class="card hidden h-100" data-name ="<?php echo htmlspecialchars($animal['habitat_id'])?>">
          <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($image) ?>" class="card-img-top" alt="<?php echo htmlspecialchars($animal['animal_nom']) ?>"> 
          <div class="card-body text-white bg-black d-flex align-items-center justify-content-center">
            <h5 class="card-title"><?php echo htmlspecialchars($animal['animal_nom']) ?></h5>
          </div>
        </div>
        <?php endforeach; ?>
      </div>


    <div class=" sheet container text-center mt-5 mb-4 p-5">
      <div class="row">
        <div class="col-sm-4 col-md-8  offset-md-0">
          <img src="../images/zébre.jpg" class="img-fluid" alt="zébre">
        </div>
        <div class="col-sm-5 col-md-4 text-end text-bold">
          <h3 class=" text-success mb-5 mt-5 "> Admirer une multitude d'animaux venus des quatre coins du monde </h3>
          <p class=""> Partez à la rencontre des animaux sauvages et des espèce menacées</p>
          <button  onclick="window.location.href='./animals.php'" class="btn btn-success btn-lg  p-4 mt-4">Découvrir les fiches animaux </button>"
        </div>
      </div>
    </div>
  </div>
  </main >
  
  <footer class="footer">
      <div class="box-container">
        <div class="box">
          <h3><i class="fas fa-paw"></i>Zoo Arcadia</h3>
          <p class="links"><i class="fas fa-clock"></i> monday-friday</p>
          <p class="days">7:00AM - 11:00PM</p>
        </div>
        <div class="box">
          <h3> Contact Info</h3>
          <a href="#" class="links"><i class="fas fa-phone"></i> 1234-456 </a>
          <a href="#" class="links"><i class="fas fa-phone"></i> 1234-987 </a>
          <a href="#" class="links"><i class="fas fa-envelope"></i>info@zoolife.fr </a>
          <a href="#" class="links"><i class="fas fa-marker-alt"></i>bourdaux, France</a> 
        </div>
    
        <div class="box">
          <h3> Quick links</h3>
          <a href="#" class="links"><i class="fas fa-arrow-right"></i> Accueill</a>
          <a href="#" class="links"><i class="fas fa-arrow-right"></i> billet & Tarifs</a>
          <a href="#" class="links"><i class="fas fa-arrow-right"></i> Restaurant & Boutiques</a>
          <a href="#" class="links"><i class="fas fa-arrow-right"></i> Services</a>
          <a href="#" class="links"><i class="fas fa-arrow-right"></i> Nos animaux </a>
          <a href="#" class="links"><i class="fas fa-arrow-right"></i> conatact 1 questions fréquents</a>
        </div>
    
        <div class="box">
          <h3>newslettre</h3>
          <input type="email" placeholder="Your Email" class="email"><br>
          <p> Abonne pour en savoir plus</p>
          <a href="#" class="btn btn-warning">Abonne toi</a>
          <div class="share">
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="fa-brands fa-x-twitter"></a>
            <a href="#" class="fa-brands fa-instagram"></a>
            <a href="#" class="fa-brands fa-linkedin"></a>
          </div>
        </div>
      </div>
      <div class="credit">&copy; 2024 Zoo Arcadia. Tous les droits sont réservées </div>
  </footer>
    <script src="../Assets/Bootstraps/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.min.js"></script>
    <script src="../Assets/js/habitat.js"></script>
</body>
</html>