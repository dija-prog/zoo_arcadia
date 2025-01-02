<?php
namespace App\Models;
use App\Database;
use PDO;


class VeterinaireModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }
    public function addCommentHabitat($habitat_id, $commentaire, $date_commentaire)
    {
        $stmt = $this->pdo->prepare("INSERT INTO commentaire_habitats (habitat_id,commentaire,date_commentaire) VALUE (?,?,?)");
        return $stmt->execute([$habitat_id, $commentaire,$date_commentaire]);
    }

    public function getFoodanimals()
    {
        $stmt = $this->pdo->prepare("SELECT* FROM food");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRapportsVeterinaires()
    {
        $stmt = $this->pdo->prepare("SELECT*FROM rapport_veterinaire");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRapportJoinAnimal()
    {   
        $animalId = $_GET['animal_id'];
        $query = "SELECT animal.animal_nom, rapport_veterinaire.* FROM animal
        INNER JOIN rapport_veterinaire on animal.animal_id = rapport_veterinaire.animal_id where animal.animal_id =:animal_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':animal_id', $animalId, PDO::PARAM_INT);
        $stmt->execute();
        $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $requests;

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