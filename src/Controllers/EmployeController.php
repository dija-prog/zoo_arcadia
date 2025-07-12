<?php

namespace App\Controllers;

use App\Models\AnimalModel;
use App\Models\AvisModel;
use App\Models\ContactModel;
use App\Models\FoodModel;
use App\Models\ServiceModel;
use App\Models\UserModel;
use App\Models\VeterinaireModel;



class EmployeController
{
    private $userModel;
    private $foodModel;
    private $animalModel;
    private $avisModel;
    private $contactModel;

    public function __construct()
    {   
        $this->userModel = new UserModel;
        $this->foodModel = new FoodModel();
        $this->animalModel = new AnimalModel();
        $this->avisModel = new AvisModel();
        $this->contactModel = new ContactModel();
    }
    public function index()
    {
        session_start();
        // vérification de la session
        if (!isset($_SESSION['username']) || $_SESSION['role'] != '2') {
            header('Location:/login.php');
            exit;
        }

        $avisId = isset($_GET['avis_id']) ? intval($_GET['avis_id']) : null;
        $id_food = isset($_GET['id_food']) ? intval($_GET['id_food']) : null;
        


        // Récupérer les données nécessaires
        $users = $this->userModel->getNonAdminUsers();
        $foods = $this->foodModel->getFoodanimals();
        $animals = $this->animalModel->getAnimals();
        $req = $this->foodModel->deleteFood($id_food);
        $avisEnAttente = $this->avisModel->getAvisAttente();
        $avis = $this->avisModel->getAvisValides();
        $updateAvis = $this->avisModel->updateAvis($avisId);
        $deleteAvis = $this->avisModel->deleteAvis($avisId);
        $messages = $this->contactModel->showMessages();


        // Inclure la vue employé
        require_once __DIR__ . '/../views/employe.php';
    }

    public function validerAvis($avis_id)
    {    
        if ($this->avisModel->updateAvis($avis_id)) {
            // $_SESSION['message'] = "Avis validé avec succès.";
        } else {
            // $_SESSION['message'] = "Erreur lors de la validation de l'avis.";
        }
        header('Location: /employe#avis');
        exit;
    }

    public function deleteAvis($avisId)
    {
        if ($this->avisModel->deleteAvis($avisId)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Suppression échouée']);
        }
        header('Location: /employe#avis');
        exit;
    }
}
