<?php
include('../includes/database.php');
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !='2'){
    header('location:connexion.php');
    exit;
}
$message=[];
try {

    //récuperer les données contact 
    
    $req = "SELECT * FROM  contact  ";
    $stmt = $bdd->prepare($req);
    $stmt->execute();

    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (Exception $e) {
    echo "erreur:" . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>employé</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-light bg-light flex-md-nowrap p-0 shadow ">
        <div class=" d-flex align-items-center">
        <!-- Toggle Button -->
        <button  id="toggle-btn" class="btn btn-warning " onclick="toggleSidebar()"> <i class="fas fa-bars"></i></button>
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
        <a class="navbar-brand col-sm-3 col-md-2 py-2 px-5" href="">Employé</a>
        <!-- <?php htmlspecialchars($User['nom'])?>
        <?php htmlspecialchars($User['username'])?> -->
        
        <a href="../Accuiel.php" class="nav-link d-flex align-items-center">
            <i class="fas fa-home"></i>
            <span class="ms-2 nav-link-text">Home</span>
        </a>
        
        <a href="#animals" class="nav-link d-flex align-items-center">
            <i class="fas fa-paw"></i>
            <span class="ms-2 nav-link-text">Animals</span>
        </a>
        <a href="#avis" class="nav-link d-flex align-items-center">
            <i class="fas fa-star"></i>
            <span class="ms-2 nav-link-text">Avis</span>
        </a>
        <a href="#messages" class="nav-link d-flex align-items-center">
            <i class="fas fa-message"></i>
            <span class="ms-2 nav-link-text">Messages</span>
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
    <!-- afficher le graphique de poids des animaux -->
    
    <div class="chart-container">
        
        <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
    </div>
        <!-- tableaux nouriture des animaux -->

<?php

try{
    $stmt = $bdd->prepare("SELECT * FROM food ");
    $stmt->execute();
    $foods= $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e){
        echo"Ereeur:" .$e->getMessage();
}
?>


        
    <section id=animals>
        <table class="table table-striped ">
            <thead class="table-dark">
            <tr>
                <th>Animale</th>
                <th>Nouriture</th>
                <th>Quantité</th>
                <th>Date  </th>
                <th>Heure </th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            
            ?>
            <tr>
                <?php foreach( $foods as $food) {?>
                <td><?php echo htmlspecialchars( $food['animal_nom']) ?></td>
                <td><?php echo htmlspecialchars($food['foodType']) ?></td>
                <td><?php echo htmlspecialchars($food['quantite']) ?></td>
                <td><?php echo htmlspecialchars($food['Date']) ?></td>
                <td><?php echo htmlspecialchars($food['Heure']) ?></td>

                <td>
                    <a href="../CRUD/supprimer.php?id_food=<?=$food['id_food']?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer ?')"  id="sup" class="btn btn-danger btn-sm">Supprimer</i></a>
                </td>
            </tr> 
            <?php } ?>
            </tbody> 
        </table>
        <button id="animalBtn" class=" btn btn-warning mb-3 " >
            <a href="../CRUD/add_animalFood.php"> Ajouter </a>
        </button>
    </section>

        <!-- gérer l'avis des visiteurs -->
    <section id="Avis" class="container ml-5 mb-4">
        <h2 class="text-success p-3">Avis des visiteurs</h2>
        <?php
        // récupérer les avis en attente de validation 

        $stmt = $bdd-> query("SELECT avis_id, pseudo, commentaire FROM avis  ");
        $avisEnAttente = $stmt-> fetchAll();
        foreach ($avisEnAttente as $avis){
            echo "<div>";
            echo "<stong>". htmlspecialchars($avis['pseudo'])."</stong>";
            echo "<p>". htmlspecialchars($avis['commentaire'])."</p>";
            echo "<a  href='valider_avis.php?avis_id=".$avis['avis_id']."'>Valider</a>|";
            echo "<a href='supprimer_avis.php?avis_id=".$avis['avis_id']."'>Supprimer</a>|";
            echo"</div>";
        }
        ?>
    <!-- gérer les messages des visiteur -->
    
    <section id= messages class="container my-5 ">
        <h2 class=" text-success mb-4 ">Messages de contact</h2>
        <div class="cards row g-3 p-5 mb-4">
            <div class="card h-100 ">
                <?php foreach ($messages as $message){ ?>
                    <div class="card-header">
                        <?php echo htmlspecialchars($message['titre']);?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Email:<?php echo htmlspecialchars($message['email']); ?></h5>
                        <p class="card-text">Message: <?php echo htmlspecialchars($message['description']); ?></p>
                        <a href="#" class="btn btn-warning">Répondre</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <script src="../Assets/js/admin.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.min.js"></script>
    <script src="../Assets/Bootstraps/js/bootstrap.bundle.js"></script>
    
</body>
</body>
</html>