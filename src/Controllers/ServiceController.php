<?php
namespace App\Controllers;

use App\Models\ServiceModel;

class ServiceController
{
    private $model;

    public function index()
    {   
        $serviceModel = new ServiceModel();
        $service_id = $params['service_id'] ?? '';
        
        require_once __DIR__ . '/../views/admin.php';
    }

    public function __construct()
    {
        $this->model = new ServiceModel();
        
    }
    public function showService()
    {
        require_once __DIR__ . '/../views/service.php';
    }

    public function add_Services()
    {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST")  
        {
            //Récupérer les données du formulaire
            $service_nom = $_POST['service_nom'];
            $description = $_POST['description'];

            // Appeler la méthode addAnimal
            if ($this->model->addService($service_nom, $description))
            { 
                header("Location:admin#servicetable"); 
            }else{
                echo "Erreur lors de l'ajout de l'animal";
            }
        }
        

        require_once __DIR__ . '/../views/CRUD/add_service.php';

    }

    public function editService($service_id)
    {
        
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $service_id = intval($_POST['service_id']); 
            $service_nom = $_POST['service_nom'];
            $description = $_POST['description'];
            // //    préparer la requete
            if($this->model->editService($service_id, $service_nom, $description)){
                header("Location:/admin#services");
                
            } else {
                echo "Erreur lors de la modification de service.";
            }
            
        }
            
            $service = $this->model->getServiceById($service_id);

            require_once __DIR__. "/../views/CRUD/edit_service.php";

    } 
    public function deleteService($serviceId) 
    {
        if($this->model->deleteService($serviceId)) {
            header("Location:/admin#services"); 
            
        }else {
            echo "Erreur lors de la suppression de l'animal";
        }

        
    }
}