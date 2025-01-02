<?php 
namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\UserModel;
use App\Models\ServiceModel;
use App\Models\RapportModel;
use App\Models\VeterinaireModel;


class AdminController
{

    public function index()
    {
        session_start();
        // vérification de la session
        if (!isset($_SESSION['username']) || $_SESSION['role'] != '1') {
            header('Location:/login.php');
            exit;
        }
        
        //charger les models
        $userModel = new UserModel();
        $animalModel = new AnimalModel();
        $serviceModel = new ServiceModel();
        $rapportModel = new RapportModel();
        $veterinaireModel = new VeterinaireModel();
        
        
        //gestion des tri
        $animalId = isset($_GET['animal_id']) ? intval($_GET['animal_id']) : null;
        $order = 'DESC';
        if(isset($_GET['order'])){
            $order = $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';
            
        }

        // Récupérer les données 
        $users = $userModel->getNonAdminUsers();
        $animals = $animalModel->getAnimals();
        $services = $serviceModel->getServices();
        //$rapports = $rapportModel->getRapports($order); 
        $requests = $rapportModel->getRapportJoinAnimal( $animalId,$order); 
        $rows = $animalModel->getAnimalsJoin();
        $req = $animalModel->deleteAnimal($animalId);
        var_dump($requests);


        //inclure la vue avec les données 

        require_once __DIR__ . '/../views/admin.php';
    }


}
?>