<?php
namespace App\Controllers;

use App\Models\HabitatModel;
use App\Models\AnimalModel;

class HabitatController
{
    public function index()
    {
        $habitatModel = new HabitatModel();
        $animalModel = new AnimalModel();

        // Récupérer les données 
        $habitat = $habitatModel->getHabitat();
        $animals = $animalModel->getAnimals();
        


        //inclure la vue avec les données 

        require_once __DIR__ . '/../views/habitat.php';
    }

   
}    