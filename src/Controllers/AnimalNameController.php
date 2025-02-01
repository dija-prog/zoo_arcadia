<?php
namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\VeterinaireModel;
use App\Models\ViewsModel;

class AnimalNameController
{
    public function index(array $params)
    {   
        $animalName = $params['animalName'] ?? '';
        $animalName = urldecode($animalName);
        $viewsModel = new ViewsModel();
        //charger le model
        $animalModel = new AnimalModel();
        $veterinaireModel = new VeterinaireModel();
        $viewsModel = new ViewsModel();
        //Récuperer les données necéssaire
        
        $details = $animalModel->getAnimalByName($animalName);
        $rapports = $veterinaireModel->getVeterinaryRapport($details['animal_id']);

        $viewsModel->incrementView( $animalName);
        

        // inclure les données à la vue 
        require_once __DIR__ . '/../views/animalName.php';
    }

   
    
}
