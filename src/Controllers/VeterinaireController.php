<?php
namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\VeterinaireModel;
use App\Models\RapportModel;
use App\Models\FoodModel;
use App\Models\HabitatModel;
use App\Models\UserModel;

class VeterinaireController
{
    private $veterinaireModel;
    private $RapportModel;
    private $AnimalModel;
    private $FoodModel;
    private $habitatModel;
    private $userModel;
    
    public function __construct()
    {
        $this->veterinaireModel = new VeterinaireModel();
        $this->AnimalModel = new AnimalModel();
        $this->FoodModel =new FoodModel();
        $this->habitatModel = new HabitatModel();
        $this->userModel = new userModel();
    }
    public function index()
    {
        session_start();

        if(!isset($_SESSION['username']) || $_SESSION['role'] !='3'){
            header('location:/login');
            exit;
        }
        
        $comment_id = isset($_GET['comment_id']) ? intval($_GET['comment_id']) : null;
        
        $users = $this->userModel->getNonAdminUsers();
        $foods = $this->FoodModel->getFoodanimals();
        $rapports = $this->veterinaireModel->getRapports();
        
            

        require_once __DIR__ . '/../views/veterinaire.php';
    }
    public function animaleFood() {
        $id_food = isset($_GET['id_food']) ? intval($_GET['id_food']) : null;

        $foods = $this->FoodModel->getFoodanimals();
        require_once __DIR__ . '/../views/veterinaire.php';
        
    }

    public function getrapport() {
        $rows = $this->veterinaireModel->getRapports();
        require_once __DIR__ . '/../views/admin.php';
    }

    public function addCommentHabitat(): void
    {
        
        // insérer le commentaire de l'habitat dans la table commentaires_habitats
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $habitat_id = $_POST['habitat_id'];
            $commentaire = $_POST['commentaire'];
            $date_commentaire = $_POST['date_commentaire'];

            $stmt = $this->veterinaireModel->AddCommentHabitat();

            
            if($stmt) {
                header("Location: /veterinaire#habitat");
                exit;
            } else {
                //echo "Erreur lors de l'ajout du commentaire.";
            }
        }

        require_once __DIR__ . '/../views/veterinaire.php';
    }

    public function rapportVeterinaire()
    {   

        if ($_SERVER["REQUEST_METHOD"] === "POST")  
        {
            //Récupérer les données du formulaire
            $animal_id = $_POST['animal_id'];
            $foodType = $_POST['foodType'];
            $quantite =$_POST['quantite'];
            $etat =$_POST['etat'];
            $detail =$_POST['detail'];
            $date =$_POST['date'];
            // Appeler la méthode addAnimal
            if ($this->veterinaireModel->getRapportVeterinaire($animal_id,$foodType,$quantite,$etat,$detail,$date)){ 
            }else{
                echo "Erreur lors de l'ajout de l'animal";
            }
        }
        
        $animals = $this->AnimalModel->getAnimals();
        require_once __DIR__ . '/../views/rapport.php';
    }


}
