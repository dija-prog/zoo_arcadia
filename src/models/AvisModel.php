<?php

namespace App\Models;

use App\Database;

use PDO;
use PDOException;

class AvisModel
{
    private $pdo ; 
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function addAvis()
    {
      if($_SERVER["REQUEST_METHOD"] === 'POST') {
        $pseudo = htmlspecialchars(($_POST['pseudo']));
        $avis = htmlspecialchars($_POST['commentaire']);
        //insérer l'avis dans la  base de donnée
        $avisInsert = $this->pdo->prepare("INSERT INTO avis (pseudo,commentaire) VALUES(?,?)");
        if ($avisInsert->execute(([$pseudo, $avis]))) {
          echo "Votre avis a été soumis et est en attente de validation";
        } else {
          echo "Erreur lors de la soumission de l'avis";
        }
      }
    }
    public function getAvis()
    {
      // Aficher les avis validés
      $stmt = $this->pdo->query("SELECT pseudo, commentaire FROM avis WHERE isValide = 1 ");
      $avisValides = $stmt->fetchAll();
      return $avisValides;

    }

    public function updateAvis()
    {
      if (isset($_GET['avis_id'])){
        $avis_id = (int)$_GET['avis_id'];
    
        try{
            $stmt = $this->pdo->prepare("UPDATE avis SET isValide = 1 WHERE avis_id = ?");
            if ($stmt->execute([$avis_id])) {
                echo"Avis valide avec succès";
            } else {
                echo "Erreur lors de la validation de l'avis.";
            }
            header("Location:./employé.php");
            exit;
    
        } catch (PDOException $e){
            echo"Erreur " .$e->getMessage();
        }
    }
    }

    public function deleteAvis()
    {
      if(isset($_GET['avis_id'])){
        $avis_id = (int)$_GET['avis_id'];
    
        $stmt = $this->pdo->prepare("DELETE FROM avis WHERE avis_id = ?");
        if($stmt->execute([$avis_id])){
            echo"Avis supprimé avec succès.";
        } else {
            echo "Erreur lors de la suppresion de l'avis.";
        }
        header("Location:./employé.php");
        exit;
    }
    }

        
}





?>