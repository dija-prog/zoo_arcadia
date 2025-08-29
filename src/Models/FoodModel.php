<?php
namespace App\Models;
use App\Database;
use PDO;
use PDOException;


class FoodModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function getFoodanimals()
    {   

        $query = "SELECT * FROM food";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $foods = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $foods;
    
    }

    public function getFoodById($id_food)
    {   
            if(isset($id_food['id_food'])){
            $stmt = $this->pdo->prepare('SELECT * FROM `food` WHERE id_food = ?');
            $stmt->execute(array($id_food['id_food']));
            $food = $stmt->fetch(PDO::FETCH_ASSOC);
            return $food;
        }
    }


    public function insertFood($animal_nom,$foodType,$quantite,$date,$heure)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
    

            $animal_nom = $_POST['animal_nom'];
            $foodType = $_POST['foodType'];
            $quantite = $_POST['quantite'];
            $date = $_POST['date'];
            $heure = $_POST['heure'];
        
            $stmt = $this->pdo->prepare("INSERT INTO food (animal_nom,foodType,quantite,date,heure) VALUES (?,?,?,?,?)");
            try{
        
                if ($stmt->execute(array($animal_nom,$foodType,$quantite,$date,$heure))){
                    header('Location:employe');
            
                }else{
                    echo "erreur d'ajout";
                } 
            }catch (PDOException $e){
                    echo"Ereeur:" .$e->getMessage();
            }
        
        }    
    }

    public function editFood($id_food, $animal_nom, $foodType, $quantite, $date, $heure) 
    {        
    
        $query = $this->pdo->prepare("UPDATE food SET animal_nom = :animal_nom, foodType = :foodType, quantite = :quantite, date= :Date, heure = :Heure  WHERE id_food = :id_food");
    
        $query->bindParam(':id_food',$id_food, PDO::PARAM_INT);
        $query->bindParam(':animal_nom',$animal_nom, PDO::PARAM_STR);
        $query->bindParam(':foodType',$foodType, PDO::PARAM_STR);
        $query->bindParam(':quantite',$quantite, PDO::PARAM_STR);
        $query->bindParam(':Date',$date, PDO::PARAM_INT);
        $query->bindParam(':Heure',$heure, PDO::PARAM_INT);

        $request= $query->execute();
        return $request;
        
    } 

    public function deleteFood($food)
    {   
        
        try {
            $req = $this->pdo->prepare("DELETE FROM food WHERE id_food = :id_food");
            $req->bindParam(':id_food', $food['id_food'], PDO::PARAM_INT);
            if ($req->execute()) {
                return true; // Suppression réussie
            } else {
                // Affiche les erreurs SQL
                $_SESSION['error'] = "Erreur lors de la suppression.";
                return false;
            }
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression : " . $e->getMessage();
            return false;
        }

    }


}


