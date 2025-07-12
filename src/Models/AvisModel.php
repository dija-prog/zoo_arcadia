<?php

namespace App\Models;

use App\Database;

use PDO;
use PDOException;

class AvisModel{
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
    public function getAvisValides(): array
    {
      // Aficher les avis validés
      $stmt = $this->pdo->query("SELECT pseudo, commentaire FROM avis WHERE isValide = 1 ");
      $avisValides = $stmt->fetchAll();
      return $avisValides;

    }
    public function getAvisAttente(): array
    {
      $stmt = $this->pdo->query("SELECT * FROM avis WHERE isValide = 0 ");
      $avis = $stmt->fetchAll();
      return $avis;

    }

    public function updateAvis($avis): bool
    {   
      if ($avis === null) {
        return false;  // ID invalide
    }
        $stmt = $this->pdo->prepare("UPDATE avis SET isValide = 1 WHERE avis_id = ? ");
        return $stmt->execute([$avis['avis_id']]);
    }

    public function deleteAvis($avis): bool
    {   
      if ($avis === null) {
        return false;  // ID invalide
      }
        $stmt = $this->pdo->prepare("DELETE FROM avis WHERE avis_id = ?");
        
        return $stmt->execute([$avis['avis_id']]);
      
    }

    


    

        
}

