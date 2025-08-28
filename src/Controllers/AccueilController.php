<?php
namespace App\Controllers;

use App\Models\AvisModel;

class AccueilController
{
    private $avisModel;

    public function __construct()
    {
        // Initialisation de la propriété
        $this->avisModel = new AvisModel();
    }

    public function index()
    {
        
        $avisValides = $this->avisModel->getAvisValides();
        $avisInsert = $this->avisModel->addAvis();

        // Inclure la vue avec les données
        require_once __DIR__ . '/../views/Accueil.php';
    }
}
