<?php
namespace App\Controllers;
use App\Models\AvisModel;

class AccueilController
{   
    private $avisModel;
    
    public function index()
    {
        $avisModel = new AvisModel();
        $avisInsert = $avisModel -> addAvis();
        $avisValides= $avisModel ->getAvisValides();


        //inclure la vue avec les données 
    
        require_once __DIR__ . '/../views/Accueil.php';
    }

}
?>