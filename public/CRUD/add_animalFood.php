<?php
include('../includes/database.php');

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    
    $animal_nom= $_POST['animal_nom'];
    $food = $_POST['foodType'];
    $quantite = $_POST['quantite'];
    $date = $_POST['date'];
    $heure =$_POST['heure'];



    $stmt = $bdd->prepare("INSERT INTO food (animal_nom,foodType,quantite,date,heure) VALUES (?,?,?,?,?)");
    try{

        if ($stmt->execute(array($animal_nom,$food,$quantite,$date,$heure))){
            echo "ajout  réussie";
            header("location: ../roles/employé.php");
            exit;
    
        }else{
            echo "erreur d'ajout";
        } 
    }catch (PDOException $e){
            echo"Ereeur:" .$e->getMessage();
        }

}

// récupérer les animal_nom dans la table d\'animaux

try{    
        $stmt = $bdd->prepare("SELECT animal_nom FROM animal ");
        $stmt->execute();
        $animals= $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e){
            echo"Ereeur:" .$e->getMessage();
    }

    
    
    
    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Bootstraps/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/css/admin.css">
    <title>Ajouter les données de nouriture des animaux</title>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-success mb-4">  La consommation des animaux</h2>
        <form method="POST" >
            <div class="form-group mb-4" for="animal">
                <select class="form-control" id="animal" name="animal_nom" required>
                    <option selected>Choisir un Animal</option>
                    <?php foreach($animals as $animal){ ?>
                    <option value="<?php echo htmlspecialchars($animal['animal_nom']);?>"> 
                        <?php echo htmlspecialchars($animal['animal_nom']);?>
                    </option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group mb-4">
                <label for="food"> Type de Nouriture :</label>
                <input class="from-control" type="text" id="food" name="foodType" required>
            </div>

            <div class="form-group mb-4">
                <label for="quantite"> Quantité(gr) :</label>
                <input class="from-control" type="number" id="quantite" name="quantite" required>
            </div>

            <div class="form-group mb-4">
                <label for="date"> Date:</label>
                <input class="from-control" type="date" id="date" name="date" required>
            </div>

            <div class="form-group mb-4">
                <label for="heure"> Heure :</label>
                <input class="from-control" type="time" id="heure" name="heure" required>
            </div>
            <button type= "submit" class="btn btn-warning  mb-4">Enregistrer </button>

        </form>
    </div>

    
</body>
</html>