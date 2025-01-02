<?php
namespace App\Controllers;
use App\Models\VeterinaireModel;

class VeterinaireController
{
    private $model;
    
    public function __construct()
    {
        $this->model = new VeterinaireModel();
    }
    public function index()
    {
        session_start();

        if(!isset($_SESSION['username']) || $_SESSION['role'] !='3'){
            header('location:/login.php');
            exit;
        }

        // insérer le commentaire de l'habitat dans la table commentaires_habitats
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $habitat_id = $_POST['habitat_id'];
            $commentaire = $_POST['commentaire'];
            $date_commentaire = $_POST['date_commentaire'];

            $stmt = $this->model->AddcommentHabitat($habitat_id,$commentaire,$date_commentaire);
            
            if($stmt) {
                header("Location: /veterinaire.php");
                exit;
            } else {
                echo "Erreur lors de l'ajout du commentaire.";
            }
        }

        $foods = $this->model->getFoodanimals();
        $rapports = $this->model->getRapportsVeterinaires();

        require_once __DIR__ . '/../views/veterinaire.php';
    }
}
?>