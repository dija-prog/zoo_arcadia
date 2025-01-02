<?php
namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\VeterinaireModel;

class AnimalNameController
{
    public function index(array $params)
    {   
        $animalName = $params['animalName'] ?? '';
        $animalName = urldecode($animalName);
        //charger le model
        $animalModel = new AnimalModel();
        $veterinaireModel = new VeterinaireModel();
        //Récuperer les données necéssaire
        
        $details = $animalModel->getAnimalByName($animalName);
        $rapports = $veterinaireModel->getVeterinaryRapport($details['animal_id']);
        // $stmt = $veterinaireModel-> getRapportsVeterinaires();

        // inclure les données à la vue 
        require_once __DIR__ . '/../views/animalName.php';
    }
    
    
}
