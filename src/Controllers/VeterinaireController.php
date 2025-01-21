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
        $this->RapportModel = new RapportModel();
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
        $rapports = $this->RapportModel->getRapports();
        $habitat = $this ->habitatModel->getHabitat();
        
        //$requests = $this->model->getRapportJoinAnimal();


        require_once __DIR__ . '/../views/veterinaire.php';
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


}
