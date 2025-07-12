<?php
namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\FoodModel;

class FoodController
{

    private $foodModel;
    private $animalModel;

    public function index()
    {   
        $id_food = isset($_GET['id_food']) ? intval($_GET['id_food']) : null;
        
        $foodModel = new FoodModel();
        $animalModel = new AnimalModel();
    
    
        require_once __DIR__ . '/../views/employe.php';
    }
    
    public function __construct()
    {
        $this->foodModel = new FoodModel();
        $this->animalModel = new AnimalModel();
    }
    // Ajouter de la nourriture pour un animal
    public function addFood()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_food = $_POST['id_food'];
            $animal_nom = $_POST['animal_nom'];
            $foodType = $_POST['foodType'];
            $quantite = $_POST['quantite'];
            $date = $_POST['date'];
            $heure = $_POST['heure'];

            if ($this->foodModel-> insertFood($id_food,$animal_nom,$foodType,$quantite,$date,$heure)){
                header("Location: /employe#animaletable");
            } else {
                echo "Erreur lors de l'ajout de la nourriture.";
            }
        } else {
            // Récupérer la liste des animaux pour le formulaire

            $animals = $this->animalModel->getAnimals();
            require_once __DIR__ . '/../views/CRUD/add_food.php';
        }
    }

    public function editFood($id_food)
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") 
        {
            //$id_food = intval($_POST['id_food']);
            $animal_nom = $_POST['animal_nom'];
            $foodType = $_POST['foodType'];
            $quantite = $_POST['quantite'];
            $date = $_POST['Date'];
            $heure = $_POST['Heure'];

            if ($this->foodModel->editFood($id_food, $animal_nom, $foodType, $quantite, $date, $heure)) {
                header("Location:/employe");
            } else {
                echo "Erreur lors de la modification de l'animal.";
            }
        }

        $food = $this->foodModel->getFoodById($id_food);

        require_once __DIR__ . "/../views/CRUD/edit_food.php";
    }

    public function deleteFood($id_food)
    {
        var_dump($id_food);
        if ($this->foodModel->deleteFood($id_food)) {
            header("Location:/employe#animaletable");
        } else {
            echo "Erreur lors de la suppression de utilisateur";
        }
    }

}

?>