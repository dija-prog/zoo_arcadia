<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- style-css -->
  <link rel="stylesheet" href="./Assets/css/Accueil.css">
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="./Assets/bootstrap/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="./images/fiveicon.png">
  <title> ZOO Arcadia </title>
</head>
<body>
  <header>
    <!-- navbar start -->
    <?php include_once __DIR__ .'/includes/navbar.php'?>
    <!-- end navbar  -->
  </header>
  <main>
    <div id="cover" class="container-fluid p-0">
      <img src="./images/image_cover.jpg" class="cover img-fluid" alt="photo de couverture">
      <div class="carousel-caption d-none d-md-block">
        <h1> Bienvenue au Zoo Arcadia</h1>
        <p> Découvrez la faune fascinante de notre zoo et plongez dans un monde de merveilles naturelles.</p>
      </div>
    </div>
    <!-- section boxes -->
    <div class="container-fluid">
      <div id="boxes">
        <div class=" row  ">


          <div id="box-1" class="col mx-2 d-none d-sm-block  text-center">
            <a href="#habitat">
              <h5 class="card-title"> <i class="fa-solid fa-paw"></i> Nos Animaux</h5>
            </a>
          </div>

          <div id="box-1" class="col mx-2 d-none d-sm-block  text-center">
            <a href="#services">
              <h5 class="card-title"> <i class="fa-solid fa-bell-concierge"></i> Services</h5>
            </a>
          </div>

          <div id="box-1" class="col mx-2 d-none d-sm-block  text-center">
            <a href="#contact">
              <h5 class="card-title"> <i class="fa-solid fa-map"></i> contactez-nous</h5>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- section boxes-end -->


    <!-- Histoire de zoo     -->
    <section class="container-fluid about" id="about">
      <div class="row">
        <h2 class="deco-title fs-3"> A propos de Nous </h2>
        <div class="col-lg-6  col-md-6 col-sm-12">
          <div class="story-content">
            <p> <br>
              Le Zoo Arcadia a ouvert ses portes en 1985, grâce à la vision et à
              la passion de Marie et Jacques Delacroix,un couple de naturalistes dévoués.
              Situé à proximité de la magnifique forêt de Bretagne,
              le zoo a été conçu pour offrir aux visiteurs une expérience immersive tout en mettant
              l'accent sur la conservation et l'éducation.
              Expansion et Innovation.
              Au cours des années 1990, le Zoo Arcadia a connu une expansion significative.
              De nouveaux enclos ont été construits pour accueillir une variété d'espèces animales,
              allant des majestueux lions africains aux gracieux flamants roses.
            </p>
          </div>
          <div class="more-content">
            <p>
              Dans les années 2000, le Zoo Arcadia a renforcé son engagement envers la conservation.
              Le zoo a établi des partenariats avec plusieurs organisations internationales de conservation
              pour participer à des programmes de reproduction en captivité et à
              la réintroduction d'espèces menacées dans leur habitat naturel.
              Le centre de recherche du zoo est devenu un leader dans l'étude du comportement animal et
              des écosystèmes.
            </p>
            <p>
              Le Zoo Arcadia est profondément enraciné dans la communauté locale.
              Chaque année,il organise des événements spéciaux tels que des journées portes ouvertes,
              des ateliers de découverte de la nature, et des campagnes de nettoyage de la forêt environnante.
              Ces initiatives ont renforcé les liens entre le zoo et la communauté,
              faisant du Zoo Arcadia une fierté locale.
            </p>
            <p>
              Aujourd'hui, le Zoo Arcadia continue de prospérer en tant que centre de conservation,
              d'éducation et de loisirs. Avec un engagement constant envers l'innovation et la durabilité,
              le zoo s'efforce de créer un avenir où les humains et les animaux coexistent harmonieusement.
              Des projets d'expansion sont en cours, notamment la création d'un sanctuaire
              pour les espèces en danger critique d'extinction et l'implantation de technologies vertes
              pour réduire l'empreinte écologique du zoo.
            </P>
            <p>
              La mission du Zoo Arcadia est de protéger la biodiversité,
              d'éduquer le public sur l'importance de la conservation de la faune et de fournir
              un refuge sûr et enrichissant pour les animaux. À travers ses efforts continus,
              le Zoo Arcadia aspire à inspirer les visiteurs à prendre part à la préservation de notre planète
              et de ses habitants.
            </p>
          </div>
          <div>
            <p class="show-more-link text-success align-items-center"> Afficher plus</p>
          </div>

        </div>
        <div class=" container col-lg-6 images ">
          <div class="row">
            <div class="col-md-12 mb-3 d-none d-sm-block ">
              <img src="./images/Eléphant d'Afrique.jpg" alt="Éléphant d'Afrique" class="img-1  img-fluid">
            </div>
            <div class="col-md-6 mb-3 d-none d-sm-block">
              <img src="./images/Crapaud Buffle.jpg" alt="crapaud_buffle" class="img-2 img-fluid">
            </div>
            <div class="col-md-6 mb-3 d-none d-sm-block  ">
              <img src="./images/Hyène tachetée.jpg" alt="hyéne" class="img-3 img-fluid">
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    <!-- about-us--end -->
    <!-- habitat -->

    <section id="habitat" class="container-fluid">
      <div class="row">
        <h2 class="titre-habitat text-center text-light mt-5  ">
          Découvrez les différents environnements du Zoo Arcadia <br>
          &<br> plongez dans la diversité fascinante de notre faune.</h2>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner  ">
            <div class="carousel-item active">
              <div class=" col-12 col-md-4 col-sm-6 mx-auto">
                <div class="card  mt-5 mb-5 ">
                  <img src="./images/Eléphant d'Afrique.jpg" class="card-img-top img-fluid" alt="élephant">
                  <div class="card-img-overlay ">
                    <h5 class=" card-title text-center text-warning fw-bold mt-3"> Savane Africaine</h5>
                    <p class="card-text mt-5 text-center d-none d-md-block">
                      Découvrez la Jungle du Zoo Arcadia, un environnement luxuriant où singes,
                      oiseaux colorés et reptiles se côtoient parmi les arbres gigantesques et les lianes entrelacées.
                      Cliquez sur En savoir plus pour explorer cet écosystème tropical fascinant.</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="col-12  col-md-4 col-sm-6 mx-auto ">
                <div class="card mt-5 mb-5 ">
                  <img src="./images/Perroquet.jpg" class="card-img-top img-fluid" alt="peroquet">
                  <div class="card-img-overlay">
                    <h5 class="card-title text-center text-warning fw-bold mt-3">Jungle tropicale</h5>
                    <p class="card-text  mt-5 text-center d-none d-md-block">
                      Explorez les Marais du Zoo Arcadia, un habitat mystérieux abritant alligators,
                      tortues et oiseaux aquatiques dans un paysage de roseaux et d'étangs.
                      CliquwarningEn savoir plus pour découvrir la faune unique de cet écosystème humide.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="col-12 col-md-4 col-sm-6 mx-auto">
                <div class="card mt-5 mb-5 ">
                  <img src="./images/Alligator.jpg" class="card-img-top img-fluid" alt="aligateur">
                  <div class="card-img-overlay">
                    <h5 class="card-title text-center text-warning fw-bold mt-3"> Marais humide </h5>
                    <p class="card-text  mt-5 text-center d-none d-md-block">
                      Plongez dans la Forêt du Zoo Arcadia, un lieu enchanteur où cerfs,
                      renards et hiboux vivent en harmonie dans une végétation dense et variée.
                      Cliquez sur En savoir plus pour en savoir plus sur les secrets de cette forêt magique.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </section>

    <!-- habitat-end -->

    <!-- service-start -->
    <section id="services" class=" container-fluid text-light text-center">
      <h3 class="text-center  mt-4"> Services</h3>
      <hr id="premier-trait">
      <div class="container-fluid my-5">
        <div class="row ">
          <!-- card 1 -->
          <div class="col-md-4 mb-4">
            <div class="service ">
              <div class="icon-holder">
                <i class="fas fa-train icon" data-bs-toggle="modal"></i>
              </div>
              <h4 class="heading">petit train</h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis alias </p>
            </div>
          </div>
          <!-- card 2 -->
          <div class="col-md-4 mb-4">
            <div class="service text-center">
              <div class="icon-holder">
                <i class="fa-solid fa-utensils" data-bs-toggle="modal"></i>
              </div>
              <h4 class="heading">Restaurant</h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis alias </p>
            </div>
          </div>
          <!-- card 3 -->
          <div class="col-md-4 mb-4">
            <div class="service text-center">
              <div class="icon-holder">
                <i class="fa-solid fa-baby-carriage" data-bs-toggle="modal"></i>
              </div>
              <h4 class="heading">louer une poussette</h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis alias </p>
            </div>
          </div>
          <!-- card 4 -->
          <div class="col-md-4 mb-4">
            <div class="service text-center">
              <div class="icon-holder">
                <div class="card-icon">
                  <i class="fa-solid fa-restroom" data-bs-toggle="modal"></i>
                </div>
              </div>
              <h4 class="heading"> toilette</h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis alias </p>
            </div>
          </div>
          <!-- card 5 -->
          <div class="col-md-4 mb-4">
            <div class="service text-center">
              <div class="icon-holder">
                <i class="fas fa-map-signs" data-bs-toggle="modal"></i>
              </div>
              <h4 class="heading">Guide gratuit</h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis alias </p>
            </div>
          </div>
          <!-- card 6 -->
          <div class="col-md-4 mb-4">
            <div class="service text-center text">
              <div class="icon-holder">
                <i class="fas fa-children icon" data-bs-toggle="modal"></i>
              </div>
              <h4 class="heading">aire de jeux</h4>
              <p class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis alias </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- service-end -->
    <!-- gallery  -->
    <section id="gallery" class="container-fluid py-4">
      <div class="container-xxl px-2 mt-5">
        <div class="heading py-4 border-bottom border-light">
          <h1 class="text-center text-light">Galerie</h1>
          <h5 class="text-center text-light py-2">Découvrez les merveilles de la faune du Zoo Arcadia à travers notre galerie de photos.</h5>
        </div>

        <div class="row py-2 mt-3">
          <div class="column">
            <img src="./images/Eléphant d'Afrique.jpg" alt="Eléphant d'Afrique">
            <img src="./images/Rat Musqué.jpg" alt="Rat Musqué">
            <img src="./images/toucan.jpg" alt="toucan">
          </div>
          <div class="column">
            <img src="./images/lion d'Afrique.jpg" alt="lion d'Afrique">
            <img src="./images/Flamant Rose.jpeg" alt="Flamant Rose">
            <img src="./images/autruche.jpg" alt="autruche">
          </div>
          <div class="column">
            <img src="./images/dendrobate.jpg" alt="dendrobate">
            <img src="./images/Aigle Royal.jpg" alt="Aigle Royal">
            <img src="./images/Perroquet.jpg" alt="Perroquet">
          </div>
          <div class="column">
            <img src="./images/Singe Hurleur.jpg" alt="Singe Hurleur">
            <img src="./images/hippopotame.jpg" alt="hippopotame">
            <img src="./images/calao.jpg" alt="calao">     
          </div>
        </div>
      </div>
    </section>

    <section class="container-fluid avis">
      <div class=" text-center mt-4 my-5">
        <h3>Donnez Votre Avis sur Votre Expérience au Zoo Arcadia</h3>
        <p>
          Nous espérons que vous avez passé un moment inoubliable au Zoo Arcadia.
          Votre avis est très important pour nous et nous aide à améliorer constamment notre parc.
          Partagez votre expérience avec nous !
          <br>
        <ul>
          <li> Qu'avez-vous le plus apprécié lors de votre visite ?</li>
          <li>Y a-t-il des aspects que nous pourrions améliorer ?</li>
          <li>Quels ont été vos moments forts au zoo ?</li>
        </ul>
      </div>

      <!-- form-start -->
      <div class="container-fluid form">
        <form method="POST" action='./Accueil'>
          <div class="mb-3 ">
            <label for="exampleFormControlInput1" class="form-label ">Pseudo</label>
            <input type="text" class="form-control" name=pseudo id="exampleFormControlInput1" placeholder="name@example.com">
          </div>
          <div class="form-floating ">
            <textarea class="form-control" placeholder="Leave a comment here" name="commentaire" id="floatingTextarea2"></textarea>
            <label for="floatingTextarea2">Commentaire</label>
          </div>
          <div>
            <button class="btn btn-warning mt-2 mb-3 " type="submit">Envoyer</button>
          </div>
        </form>
      </div>
      <!-- form-end -->
      <div class="container">
        <p class="text-center">
          Laissez-nous vos commentaires et vos suggestions.
          <br>
          Merci de votre visite et de votre soutien à notre mission de conservation de la faune !
        </p>
      </div>
    </section>
    <div class=" reviews m-5 ">
      <h3 class="text-warning  fw-bold mb-2">Avis</h3>
      <?php
      foreach ($avisValides as $avis)
      {
        echo "<div>";
        echo "<i class='fas fa-star '></i>";
        echo "<strong>" . htmlspecialchars($avis['pseudo']) . "</strong>";
        echo "<p>" . htmlspecialchars(($avis['commentaire'])) . "</p>";
        echo "</div>";
      }
      ?>
    </div>
    <!-- localisation et horaire -->
    <section class="container-fluid text-light pb-4" id="maps">
      <div class="row">
        <div class="col-lg-12 mt-4 ml-2 text-center ">
          <h4>
            Le Zoo Arcadia est ouvert tous les jours de la semaine.<br>
            Découvrez nos horaires et planifiez votre visite pour explorer nos environnements fascinants
          </h4>
        </div>
        <div class="col-lg-6 mt-5 text-center">
          <h3 class=" text-warning">Horaires du Zoo Arcadia</h3>
          <ul>
            <li> Lundi au Vendredi : 9h00 - 18h00</li>
            <br>
            <li> Weekend : 9h00 - 21h00</li>
          </ul>
          <p>
            Venez découvrir les différents environnements du Zoo Arcadia
            et plongez dans la diversité fascinante de notre faune.
          </p>
        </div>
        <div class="col-lg-6 mt-5">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2668.726254002018!2d-2.1767559744222353!3d48.018998371230616!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480faceab3587495%3A0xcdc883e818be2eb2!2sLa%20for%C3%AAt%20de%20Broc%C3%A9liande!5e0!3m2!1sfr!2sma!4v1719485903726!5m2!1sfr!2sma" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </section>
    <!-- localisation et horaire-end -->



  </main>
  <footer class="footer ">
      <?php include_once __DIR__ .'/includes/footer.php';?>
  </footer>

  <!-- script-bootstrap js  -->
  <script src="./Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <scrip src="./Assets/bootstrap/js/bootstrap.min.js"></script>

  <!-- script js -->
  <script src="./Assets/js/Accueil.js"></script>



</body>

</html>