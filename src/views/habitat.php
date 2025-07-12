
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- style.css -->
  <link rel="stylesheet" href="../Assets/css/habitat.css">
  <!-- bootstrap.css -->
  <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" type="image/png" href="/../images/fiveicon.png">
  <title>habitat </title>
</head>
<body>
  <header>
    <!-- navbar-start -->
    <?php include_once __DIR__ .'/includes/navbar.php'?>

    <div class="container-fluid mb-5 ">
      <div class="sub-title mb-5 p-5 d-none d-md-block">
        <h1> Découvrez la diversité de nos animaux</h1>
        <P>provenant des quatre coins du monde : Afrique, Asie, et bien plus encore.</P>
      </div>
    </div>

  </header>
  <main>
    <!-- images  habitat -->

    <div class=" habitat container-fluid  mt-5 p-5 ">
      <h2 class="text-center mb-5 text-success text-bold">Découvrez nos différents habitats</h2>

      <div class="container-fluid row">
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

    <!-- images habitat end -->
    <div id="animals" class="container">
      <!-- description habitat -->
      <div class="container mt-5">
        <div class="texts">
          <?php
          // $habitat = $bdd->query("select * from habitat")->fetchAll();
          foreach ($habitat as $habitat):
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
    <!-- description habitat end -->



    <!-- animals card -->
    <div class="cards row row-cols-1 row-cols-md-4 g-3 p-5">
      <?php
        foreach ($animals as $animal) {
        $image = base64_encode($animal['image']);
        $animalName = strtolower(str_replace('', '_', $animal['animal_nom']));
      ?>
        <div class="card hidden h-100" data-name="<?php echo htmlspecialchars($animal['habitat_id']) ?>">
            <!-- <a href="animalName.php?animal_nom=<?php echo htmlspecialchars($animal['animal_nom']);?>"> -->
            <a href="../animalName/<?php echo urlencode($animal['animal_nom']);?>"> 
            <img src="../<?php echo htmlspecialchars($animal['image']) ?>" class="card-img-top" loading="lazy" alt="<?php echo htmlspecialchars($animal['animal_nom']) ?>">
          </a>
          <div class="card-body text-white bg-black d-flex align-items-center justify-content-center">
            <h5 class="card-title"><?php echo htmlspecialchars($animal['animal_nom']) ?></h5>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class=" sheet container text-center mt-5 mb-4 p-5">
      <div class="row">
        <div class="col-sm-4 col-md-8  offset-md-0">
          <img src="../images/zébre.jpg" class="img-fluid" alt="zébre">
        </div>
        <div class="col-sm-5 col-md-4 text-center text-bold">
          <h3 class=" text-success mb-5 mt-5 "> Admirer une multitude d'animaux venus des quatre coins du monde </h3>
          <p> Partez à la rencontre des animaux sauvages et des espèce menacées</p>
          <button onclick="window.location.href='./animals.php'" class="btn btn-success btn-lg  p-4 mt-4">Découvrir les fiches animaux </button>"
        </div>
      </div>
    </div>
    </div>
  </main>

  <footer>
    <?php include_once __DIR__ .'/includes/footer.php'?>
  </footer>

  <!-- style bootstrap js   -->
  <script src="../Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../Assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- style js -->
  <script src="../Assets/js/habitat.js"></script>
</body>

</html>