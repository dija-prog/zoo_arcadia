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
        // Utilisation de la propriété initialisée
        // $avisInsert = $this->avisModel->addAvis();
        $avisValides = $this->avisModel->getAvisValides();

        // Inclure la vue avec les données
        require_once __DIR__ . '/../views/Accueil.php';
    }
}
