<?php
namespace App\Controllers;
use App\Models\AvisModel;

class AccueilController
{
    public function index()
    {
        $avisModel = new AvisModel();
        $avisInsert = $avisModel -> addAvis();
        $avisValides= $avisModel ->getAvis();


        //inclure la vue avec les données 
    
        require_once __DIR__ . '/../views/Accueil.php';
    }

}
?>