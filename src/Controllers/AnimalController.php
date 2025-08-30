<?php
namespace App\Controllers;

use App\Models\AnimalModel;

class AnimalController
{
    private $model;
    
    public function index()
    {   
        $animal_id = $params['animal_id'] ?? '';
        $animalModel = new AnimalModel();
        $animals= $animalModel->getAnimals();
        $rows = $animalModel->getAnimalsJoin();   
        $stmt = $animalModel-> editAnimal($animal_id);     

        require_once __DIR__ . '/../views/admin.php';
    }

    public function __construct()
    {
        $this->model = new AnimalModel();
    }

    public function addAnimal() 
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST")  
        {
            //Récupérer les données 

            $animal_nom = $_POST['animal_nom'];
            $id_classe = $_POST['id_classe'];
            $habitat_id =$_POST['habitat_id'];

            // Appeler la méthode addAnimal

            if ($this->model->addAnimal($animal_nom, $id_classe, $habitat_id)){ 
                header("Location:admin#animaletable");  
            }else{
                echo "Erreur lors de l'ajout de l'animal";
            }
        }
        require_once __DIR__ . '/../views/CRUD/addAnimal.php';
        
    }

    public function editAnimal($animal_id)
    {
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $animal_nom = $_POST['animal_nom'];
            $id_classe = $_POST['id_classe'];
            $habitat_id = $_POST['habitat_id'];
            if($this->model->editAnimal([
                'animal_id' => $animal_id,
                'animal_nom' => $animal_nom,
                'id_classe' => $id_classe,
                'habitat_id' => $habitat_id
            ])){
                header("Location:admin#animaletable");
                exit();
                
            } else {
                $message="Erreur lrs de la modification de l'animal.";
            }
            
        }
            $animal = $this->model->getAnimalById($animal_id);
            $classes = $this->model->getClasses();
            $habitats = $this->model->getHabitats();

            require_once __DIR__. "/../views/CRUD/edit_animal.php";

    }


    public function deleteAnimal($animal_id) 
    {
        if($this->model->deleteAnimal($animal_id)) {
            header("Location:/admin#animaletable"); 
            exit();
        }else {
            $message= "Erreur lors de la suppression de l'animal";
        }
    }
    

    public function animalFilter() {
        $classe = $_GET['classe'] ?? null;
        $habitat = $_GET['habitat'] ?? null;
    
        $animaux = $this->model->getAnimaux($classe, $habitat);
        $classes = $this->model->getClasses();
        $habitats = $this->model->getHabitats();

        require_once __DIR__ . '/../views/animaux.php';

    }

    
}
