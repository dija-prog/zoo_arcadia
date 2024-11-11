<?php

require_once('../includes/database.php');
require('../vendor/autoload.php');



session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !='1'){
    header('location:connexion.php');
    exit;
}
//  echo 'Bienvenue,' . $_SESSION['username'] . "! vous êtes sur la page de l'administrateur. "

// on récupére le contenue de la table utilisateur 
$recupUser = "select * FROM  utilisateur WHERE role_id != 1 ";
$stmt = $bdd->prepare($recupUser);
$stmt->execute();
$Users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?> 


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/admin.css">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title> Admin</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-light bg-light flex-md-nowrap p-0 shadow ">
    <div class=" d-flex align-items-center">
      <!-- Toggle Button -->
    <button  id="toggle-btn" class="btn btn-warning " onclick="toggleSidebar()"> <i class="fas fa-bars"></i></button>
    <a class="navbar-brand col-sm-3 col-md-2 py-2 px-5" href="admin.php"> Admin</a>
    </div>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../login/connexion.php">Déconnexion</a>
      </li>
    </ul>
  </nav>

    <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <nav class="nav flex-column p-4 mt-5 ">
      <a href="../Accuiel.php" class="nav-link d-flex align-items-center">
        <i class="fas fa-home"></i>
          <span class="ms-2 nav-link-text">Home</span>
      </a>
      <a href="#usertable" class="nav-link d-flex align-items-center">
        <i class="fas fa-user"></i>
        <span class="ms-2 nav-link-text">Utilisateur</span>
      </a>
      <a href="#animaletable" class="nav-link d-flex align-items-center">
        <i class="fas fa-paw"></i>
        <span class="ms-2 nav-link-text">Animals</span>
      </a>
      <a href="#Rapport" class="nav-link d-flex align-items-center">
        <i class="fas fa-notes-medical"></i>
        <span class="ms-2 nav-link-text">Rapport véternaire</span>
      </a>
      <a href="#" class="nav-link d-flex align-items-center">
        <i class="fas fa-clock"></i>
        <span class="ms-2 nav-link-text">Horaires</span>
      </a>
      <a href="#services" class="nav-link d-flex align-items-center">
        <i class="fas fa-headset"></i>
        <span class="ms-2 nav-link-text">Services</span>
      </a>
    </nav>
  </div>

    

  <!-- Main Content -->
  <div id="mainContent" class="main-content mt-3" >
      <h2>Dashboerd</h2>
      <p>This is the main content of the page.</p>
      <!-- afficher le graphique -->
    <?php
    // récupérer tous les animaux et leur nombre de consultation
        // $animals = $collection->find([],[
        //   'projection'=> ['animal_nom'=> 1, 'views' =>1]
        // ]);

        // $data = [];

        // foreach ($animals as $animal){
        //   $data[]=[
        //     'name'=> $animal['animal_nom'],
        //     'views' => $animal['views']

        //   ];
        // }

    ?>


      <div class="chart-container">
        
        <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
      </div>


      
      <!-- Tableux d'utilisateur -->
      
    <section id="usertable" class="container users ml-5">
      <h2 class="text-success p-3">Liste des utilisateurs</h2>
      <table class="table table-striped ">
        <thead class="table-dark">
          <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Role</th>
            <th>modifier</th>
            <th>supprimer</th>

          </tr>
        </thead>
        <tbody>
          <?php 
            foreach($Users as $User){
          ?>
          <tr>
            <td><?php echo htmlspecialchars( $User['nom']) ?></td>
            <td><?php echo htmlspecialchars($User['prenom']) ?></td>
            <td><?php echo htmlspecialchars( $User['username']) ?></td>
            <td><?php echo htmlspecialchars($User['role_id']) ?></td>
            <td><a href="../CRUD/edit_user.php?username=<?=$User['username'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a></td>
            <td><a href="../CRUD/supprimer.php?username=<?=$User['username']?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer cet utilisateur  ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
          </tr> 
          <?php } ?>
        </tbody> 
      </table>

      <!-- bouton ajouter un utilisateur  -->
      <button id="userBtn" class=" btn btn-warning mb-3 " >
        <a href="../CRUD/add_user.php"> Ajouter </a>
      </button>
    </section>

    <!-- tableaux d'animals -->
    <?php
    $animal = "select * FROM  animal  ";
    $stmt = $bdd->prepare($animal);
    $stmt->execute();
    $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?> 
    <section id="animaletable" class="container animals mb-5 mt-4">
      <h2 class=" text-success p-4 ">Listes des animaux </h2>
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>Nom</th>
            <th>habitat</th>
            <th>la classe </th>
            <th>l'état d'animal</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        foreach($animals as $animal){
        ?>

          <tr>
            <td><?php echo htmlspecialchars( $animal['animal_nom']) ?></td>
            <td><?php echo htmlspecialchars( $animal['habitat_id']) ?></td>
            <td><?php echo htmlspecialchars( $animal['id_classe']) ?></td>
            <td><?php echo htmlspecialchars( $animal['etat']) ?></td>
            <td>
              <a href="../CRUD/edit_animal.php?animal_id=<?=$animal['animal_id']?>" class="btn btn-success btn-sm">Modifier</i></a>
              <a href="../CRUD/supprimer.php?animal_id=<?=$animal['animal_id']?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer cet animal  ?')"  id="sup" class="btn btn-danger btn-sm">Supprimer</i></a>
              <a href="../CRUD/détaile.php?animal_id=<?=$animal['animal_id']?>" class="btn btn-warning btn-sm">détaile</i></a>
            </td>
          </tr>
          <?php }
          ?>
        </tbody>
      </table>
      <!-- bouton ajouter les animaux  -->
      <button id="animalBtn"class=" btn btn-warning mb-3" >
        <a href="../CRUD/add_animal.php">
            Ajouter
        </a>
      </button>
    </section>



        <!-- rapport véternaire -->
  <?php
    // on récupére le contenue de la table utilisateur 
      $order =isset($_GET['order']) && $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';

      $rapport = "SELECT * FROM rapport_veterinaire  ORDER BY date $order";
      $stmt = $bdd->prepare($rapport);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?> 

    <section id="Rapport" class="mt-5 py-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-headrer">
                <h4>
                  <!-- Formulaire de sélection de l'ordre de tri  -->
                  <form methode="GET" class=" m-4 pt-4 d-flex justify-content-end " >
                    <label for="order">Trier par date : </label>
                    <select name="order" id="order" onchange="this.form.submit()">
                      <option value="DESC"<?= $order === 'DESC' ? 'selected' : '';?>> Décroissant</option>
                      <option value="ASC"<?= $order === 'ASC' ? 'selected' : '';?>> Croissant</option>
                    </select>
                  </form>
                </h4>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead class="table-dark ">
                    <tr class="tr">
                      <th >id</th>
                      <th >date</th>
                      <th >détailes
                      </th>
                    </tr>
                  </thead>
                  <tbody class="tbody">
                    <?php foreach($rows as $row){?>
                    <tr>
                      <td><?php echo htmlspecialchars( $row['rapport_id']) ?></td>
                      <td><?php echo htmlspecialchars( $row['date']) ?></td>
                      <td><?php echo htmlspecialchars( $row['detail']) ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    

  <!-- services de zoo en crud -->
  
  <?php
    // on récupére le contenue de la table utilisateur 
    
      $service = "SELECT * FROM  service";
      $stmt = $bdd->prepare($service);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?> 
  
  <section id="services" class="mt-5 py-4">
    <h4 class="text-success">Services de zoo</h4>
      <table class="table table-striped">
        <thead class="table-dark ">
          <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Description</th>
            <th> Actions</th>
          </tr>
        </thead>
        <tbody class="tbody">
          <?php foreach($rows as $row){?>
          <tr>
            <td><?php echo htmlspecialchars( $row['service_id']) ?></td>
            <td><?php echo htmlspecialchars( $row['service_nom']) ?></td>
            <td><?php echo htmlspecialchars( $row['description']) ?></td>
            <td>
            <a href="../CRUD/edit_service.php?service_id=<?=$row['service_id']?>" class="btn btn-success btn-sm">Modifier</i></a>
            <a href="../CRUD/supprimer.php?service_id=<?=$row['service_id']?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer cet animal  ?')"  id="sup" class="btn btn-danger btn-sm">Supprimer</i></a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>

        <!-- bouton ajouter de service  -->

      <button id="serviceBtn" class="btn btn-warning  mb-5 p-2 ">
        <a href="../CRUD/add_service.php">
          Ajouter
        </a>
      </button>
    </section>



</body>

</html>



<!-- Bootstrap JS  -->
    
    <script src="../Assets/js/admin.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.bundle.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.min.js"></script>
    

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
</body>
</html>
