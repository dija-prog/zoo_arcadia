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
    public function addCommentHabitat($habitat_id, $commentaire, $date_commentaire): bool
{
    try {
        $stmt = $this->pdo->prepare(
            "INSERT INTO commentaires_habitats (habitat_id, commentaire, date_commentaire) 
                    VALUES (:habitat_id, :commentaire, :date_commentaire)"
        );

        return $stmt->execute([
            ':habitat_id' => intval($habitat_id),
            ':commentaire' => trim($commentaire),
            ':date_commentaire' => $date_commentaire
        ]);

    } catch (PDOException $e) {
        // optionnel : loguer l'erreur
        // error_log($e->getMessage());
        return false;
    }
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

    public function getRapports()
    {
        // on récupére le contenue de la table rapport_veternaire 
        $order = isset($_GET['order']) && $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';
        $rapport = "SELECT animal.animal_id, animal.animal_nom, rapport_veterinaire.* FROM animal
        INNER JOIN rapport_veterinaire on animal.animal_id = rapport_veterinaire.animal_id ORDER BY date $order";
        $stmt = $this->pdo->prepare($rapport);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function getRapportVeterinaire($animal_id,$foodType,$quantite,$etat,$detail,$date)
    {
        $query = "INSERT INTO rapport_veterinaire (animal_id,foodType,quantite,etat,detail,date)
        VALUE (:animal_id,:foodType,:quantite,:etat,:detail,:date)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([
            ':animal_id' => $animal_id,
            ':foodType' => $foodType,
            ':quantite' => $quantite,
            ':etat' => $etat,
            ':detail'=> $detail,
            ':date'=> $date
        ]);  
    }
    
}
