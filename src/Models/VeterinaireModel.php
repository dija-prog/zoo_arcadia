<?php
namespace App\Models;
use App\Database;
use PDO;
use PDOException;


class VeterinaireModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }
    public function addCommentHabitat(): void
    {   

        $habitat_id = $_POST['habitat_id'];
        $commentaire = $_POST['commentaire'];
        $date_commentaire = $_POST['date_commentaire'];
        
        $stmt = $this->pdo->prepare("INSERT INTO commentaires_habitats
                (habitat_id,commentaire,date_commentaire) VALUE (:habitat_id,:commentaire,:date_commentaire)");
        $stmt->execute([
            ':habitat_id' => $habitat_id,
            ':commentaire' => $commentaire,
            ':date_commentaire' => $date_commentaire
        ]);
    }

    public function getFoodanimals()
    {
        $foods = $this->pdo->prepare("SELECT* FROM food");
        $foods->execute();
        return $foods->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRapportsVeterinaires()
    {
        $stmt = $this->pdo->prepare("SELECT*FROM rapport_veterinaire");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getVeterinaryRapport(int $animalId) : array
    {
        $rapport = "SELECT  animal.animal_id, animal.animal_nom, rapport_veterinaire.*, habitat.*, classe.* FROM animal 
        JOIN rapport_veterinaire ON animal.animal_id = rapport_veterinaire.animal_id JOIN habitat ON animal.habitat_id = habitat.habitat_id 
        JOIN classe ON animal.id_classe = classe.id_classe where animal.animal_id = :animal_id; ";
        $stmt = $this->pdo->prepare($rapport);
        $stmt->bindParam(':animal_id', $animalId, PDO::PARAM_INT);
        $stmt->execute();
        $rapports = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rapports;
    }
    
}
?>