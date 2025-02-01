<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Assets/css/admin.css">
  <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title> Admin</title>
</head>

<body>
  <nav class="navbar fixed-top navbar-light bg-light flex-md-nowrap p-0 shadow ">
    <div class=" d-flex align-items-center">
      <!-- Toggle Button -->
      <button id="toggle-btn" class="btn btn-warning " onclick="toggleSidebar()"> <i class="fas fa-bars"></i></button>
      <a class="navbar-brand col-sm-3 col-md-2 py-2 px-5" href="admin.php"> Admin</a>
    </div>
    <input id="searchInput" class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="/logout">Déconnexion</a>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <div id="sidebar" class="sidebar">
    <nav class="nav flex-column p-4 mt-5 ">
      <a href="/Accueil" class="nav-link d-flex align-items-center">
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
  <div id="mainContent" class="main-content  mt-3">
    <h4>Statistiques des animaux</h4>
    <canvas id="animalViewsChart" width="400" height="200"></canvas>
    <button id="refreshButton">Rafraîchir</button> <!-- Exemple de bout


    <div class="container">
        <div class="row">
            <div class="col-12">
                <canvas id="viewsChart"></canvas>
            </div>
        </div>
    </div>


    <!-- Tableux d'utilisateur -->

    <section id="usertable" class="container-fluid users ml-5">
      <h2 class="text-success p-3">Liste des utilisateurs : </h2>
      <div class="container-fluid">
        <div class=" card-role card ">
          <ul class="list-group list-group-flush">
            <li class="list-group-item"> <strong>Roles</strong></li>
            <li class="list-group-item"><strong>Employé :</strong> 2</li>
            <li class="list-group-item"><strong>Véterinaire :</strong> 3</li>
          </ul>
        </div>
      </div>
      <div class="table-responsive">
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

            foreach ($users as $user) {
            ?>
              <tr>
                <td><?php echo htmlspecialchars($user['nom']) ?></td>
                <td><?php echo htmlspecialchars($user['prenom']) ?></td>
                <td><?php echo htmlspecialchars($user['username']) ?></td>
                <td><?php echo htmlspecialchars($user['role_id']) ?></td>
                <td><a href="/edit_user/<?= $user['username'] ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a></td>
                <!-- <td><a href="/edit-User/<?php echo urlencode($username); ?>"class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a></td> -->

                <td><a href="/deleteUser/<?= $user['username'] ?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer cet utilisateur  ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>


      <!-- bouton ajouter un utilisateur  -->
      <button id="userBtn" class=" btn btn-warning mb-3 ">
        <a href="/addUser"> Ajouter </a>
      </button>
    </section>

    <section id="animaletable" class="container-fluid animals mb-5 mt-4">
      <h2 class=" text-success p-3 ">Listes des animaux : </h2>
      <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>Nom</th>
            <th>habitat</th>
            <th>la classe </th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($rows as $row) {
          ?>

            <tr>
              <td><?php echo htmlspecialchars($row['animal_nom']) ?></td>
              <td><?php echo htmlspecialchars($row['habitat_nom']) ?></td>
              <td><?php echo htmlspecialchars($row['classe_nom']) ?></td>
              <td>
                <a href="/edit_animal/<?= $row['animal_id'] ?>" class="btn btn-success btn-sm">Modifier</i></a>
                <a href="/animaldelete/<?= $row['animal_id'] ?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer cet animal  ?')" id="sup" class="btn btn-danger btn-sm">Supprimer</i></a>
              </td>
            </tr>
          <?php }
          ?>
        </tbody>
      </table>
      <!-- bouton ajouter les animaux  -->
      <button id="animalBtn" class=" btn btn-warning mb-3">
        <a href="/add-animal">
          Ajouter
        </a>
      </button>
    </section>

    <section id="Rapport" class="container-fluid mb-5 mt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="card-headrer">
                <h4>
                  <!-- Formulaire de sélection de l'ordre de tri  -->
                  <form method="GET" class="">
                    <label for="order">Trier par date : </label>
                    <select name="order" class="from-select w-auto" id="order" onchange="this.form.submit()">
                      <option value="DESC" <?= $order === 'DESC' ? 'selected' : ''; ?>> Décroissant</option>
                      <option value="ASC" <?= $order === 'ASC' ? 'selected' : ''; ?>> Croissant</option>
                    </select>
                  </form>
                </h4>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead class="table-dark ">
                    <tr class="tr">
                      <th> ID</th>
                      <th> Animale</th>
                      <th> quantite</th>
                      <th> Type de la nouriture</th>
                      <th> Etat</th>
                      <th> date</th>
                      <th> détailes</th>
                    </tr>
                  </thead>
                  <tbody class="tbody">
                    <?php foreach ($rapports as $request) { ?>
                      <tr>
                        <td><?php echo htmlspecialchars($request['animal_id']) ?></td>
                        <td><?php echo htmlspecialchars($request['animal_nom']) ?></td>
                        <td><?php echo htmlspecialchars($request['quantite']) ?></td>
                        <td><?php echo htmlspecialchars($request['foodType']) ?></td>
                        <td><?php echo htmlspecialchars($request['etat']) ?></td>
                        <td><?php echo htmlspecialchars($request['date']) ?></td>
                        <td><?php echo htmlspecialchars($request['detail']) ?></td>
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


    <section id="services" class="container-fluid mt-5 py-4">
      <h4 class="text-success">Services de zoo</h4>
      <div class="table-responsive">
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
            <?php foreach ($services as $service) { ?>
              <tr>
                <td><?php echo htmlspecialchars($service['service_id']) ?></td>
                <td><?php echo htmlspecialchars($service['service_nom']) ?></td>
                <td><?php echo htmlspecialchars($service['description']) ?></td>
                <td>
                  <a href="/edit_service/<?= $service['service_id'] ?>" class="btn btn-success btn-sm">Modifier</i></a>
                  <a href="/deleteService/<?= $service['service_id'] ?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer ce service  ?')" id="sup" class="btn btn-danger btn-sm">Supprimer</i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- bouton ajouter de service  -->
      <button id="serviceBtn" class="btn btn-warning  mb-5 p-2 ">
        <a href="/add_service">
          Ajouter
        </a>
      </button>
    </section>
  </div>
</body>

</html>



<!-- Bootstrap JS  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../Assets/js/admin.js"></script>
<script src="../Assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../Assets/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>