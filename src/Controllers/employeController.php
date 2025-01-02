<?php 
namespace App\Controllers;

use App\Models\AvisModel;
use App\Models\ContactModel;
use App\Models\UserModel;
use App\Models\VeterinaireModel;



class Employeontroller
{

    public function index()
    {
        session_start();
        // vérification de la session
        if (!isset($_SESSION['username']) || $_SESSION['role'] != '2') {
            header('Location:/login.php');
            exit;
        }
        $username = $_POST(['username']);

        //charger les models
        $avisModel = new AvisModel();
        $contactModel = new ContactModel();
        $veterinaireModel = new veterinaireModel();
        $userModel = new UserModel();
        
        // Récupérer les données 
        $messages = $contactModel->showContact();
        $avis = $avisModel->getAvis();
        $food = $veterinaireModel->getFoodanimals();
        $user = $userModel-> getUserByUsername($username);


        //inclure la vue avec les données 

        require_once __DIR__ . '/../views/employe.php';
    }
}
?>