<?php 
namespace App\Controllers;
use App\Models\RapportModel;
use App\Models\AnimalModel;

class RapportController
{
    private $RapportModel;
    private $AnimalModel;
    public function __construct()
    {
        $this->RapportModel  = new RapportModel();
        $this->AnimalModel = new AnimalModel();
    }
    public function index()
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
            if ($this->RapportModel->getRapportVeterinaire($animal_id,$foodType,$quantite,$etat,$detail,$date)){ 
            }else{
                echo "Erreur lors de l'ajout de l'animal";
            }
        }
        
        $animals = $this->AnimalModel->getAnimals();
        require_once __DIR__ . '/../views/rapport.php';
    }
}
?>