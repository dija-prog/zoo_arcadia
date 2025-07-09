<?php
// include("../includes/database.php");


//     // récupérer le nom de l'animal dans la table animal
//     $recup = "SELECT * FROM animal ";
//     $stmt = $bdd->prepare($recup);
//     $stmt->execute();
//     $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
// ?>

<?php
// Insérer les donner dans la base de donnée 


// if ($_SERVER["REQUEST_METHOD"] === "POST"){
    

//     $animal_nom = $_POST['animal_nom'];
//     $etat = $_POST['etat'];
//     $quantite =$_POST['quantite'];
//     $foodType= $_POST['foodType'];
//     $date = $_POST['date'];

//     $stmt = $bdd->prepare("INSERT INTO rapport_veterinaire (animal_nom,etat,quantite,foodType,date) VALUES (?,?,?,?,?)");
//     try{

//         if ($stmt->execute(array($animal_nom,$etat,$quantite,$foodType,$date))){
//             echo "ajout réussie";
//             // header("location: ./roles/vétérinaire.php");
    
//         }else{
//             echo "erreur d'ajout";
//         } 
//     }catch (PDOException $e){
//             echo"Ereeur:" .$e->getMessage();
//         }

//     }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/veternaire.css">
    <link rel="stylesheet" href="../Assets/bootstrap/css/bootstrap.min.css">
    <title>rapport vétérinaire</title>
</head>

<body>
    <header>
        <?php include_once __DIR__ . '/includes/navbar.php'?>
    </header>
    <main>
        <section class="container-fluid health ">
            <h2 class="text-center text-white mt-5 py-5"> Contrôle vétérinaire</h2>
            <div class="container-fluid  text-white mt-4">
                <form method="POST"  action="/rapport">
                    <div class="row justify-content-center">
                        <div class=" col-md-6 mt-4">
                            <label for="animal_id" class="form-label">Choisissez un animal</label>
                            <select name="animal_id" required>
                                <?php foreach ($animals as $animal): ?>
                                    <option value="<?= $animal['animal_id'] ?>"><?= $animal['animal_nom'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-6 m-3">
                            <label for="foodType" class="form-label"> La nourriture propsé</label>
                            <input type="text"   class="form-control"  name="foodType" required>  
                        </div>
                            
                        <div class="col-12 col-md-6 m-4">
                            <label for="food-quantity" class="form-label"> La quantité de nouriture proposé</label>
                            <input typ="number" class="form-control"  name="quantite" required>
                        </div>
                
                        <div class="col-md-6 m-3" >
                            <select class="form-select " name="etat" aria-label="Default select example">
                                <option selected name="etat"> Sélectionner l'état un animal </option>
                                <option value="En bonne santé">En bonne santé</option>
                                <option value="Malade">Malade</option>
                                <option value="Sous traitement">Sous traitement</option>
                                <option value="Blessé">Blessé</option>
                            </select>
                        </div> 
                            
                        <div class=" col-md-6 m-4">
                            <label for="passage-date" class="form-label"> LA date de passage</label>
                            <input type="date" class="form-control" id="passage-date" name="date" required>
                        </div>
    
                        <div class="col-12 col-md-6 m-4">
                            <label for="condition-details" class="form-label">détails</label>
                            <textarea class="form-control" id="condition-detail" name="detail" placeholder=" Plus de détails sur l'animal "></textarea>
                        </div>
    
                        <div class="col-12 col-md-6 m-4">
                            <button type= "submit" class="btn btn-success"> Enregistrer les informations</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </main>
</body>
</html>