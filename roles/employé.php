<?php
include('../includes/database.php');
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !='2'){
    header('location:connexion.php');
    exit;
}



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
    <title>employé</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-light bg-light flex-md-nowrap p-0 shadow ">
        <div class=" d-flex align-items-center">
        <!-- Toggle Button -->
        <button  id="toggle-btn" class="btn btn-warning " onclick="toggleSidebar()"> <i class="fas fa-bars"></i></button>
        <a class="navbar-brand col-sm-3 col-md-2 py-2 px-5" href="admin.php">Employé</a>
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
        
        <a href="#animaletable" class="nav-link d-flex align-items-center">
            <i class="fas fa-paw"></i>
            <span class="ms-2 nav-link-text">Animals</span>
        </a>
        <a href="#Rapport" class="nav-link d-flex align-items-center">
            <i class="fas fa-notes-medical"></i>
            <span class="ms-2 nav-link-text">Avis</span>
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
        

        ?>


        <div class="chart-container">
            
            <canvas id="barCanvas" aria-label="chart" role="img"></canvas>
        </div>


        
        <!-- Tableux d'utilisateur -->
        
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
            echo "<a href='valider_avis.php?avis_id=".$avis['avis_id']."'>Valider</a>|";
            echo "<a href='supprimer_avis.php?avis_id=".$avis['avis_id']."'>Supprimer</a>|";
            echo"</div>";
        }
        ?>
    </section>
        <table class="table table-striped ">
            <thead class="table-dark">
            <tr>
                <th>Animale</th>
                <th>Nouriture</th>
                <th>Quantité</th>
                <th>Date $ Heure</th>

            </tr>
            </thead>
            <tbody>
            <?php 
            
            ?>
            <tr>
                <td><?php echo htmlspecialchars( $avis['pseudo']) ?></td>
                <td><?php echo htmlspecialchars($avis['comentaire']) ?></td>
                
                <td><a href="../CRUD/supprimer.php?username=<?=$User['username']?>" onclick="return confirm('Ëtes vous sûr de vouloir supprimer cet utilisateur  ?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a></td>
            </tr> 
            <?php  ?>
            </tbody> 
        </table>

        <!-- bouton ajouter un utilisateur  -->
        <button id="userBtn" class=" btn btn-warning mb-3 " >
            <a href="../CRUD/add_user.php"> Ajouter </a>
        </button>
    <section>
    <section>


    </section>
</body>
</html>