<?php
namespace App\Models;

use App\Database;
use PDO;
use PDOException;

class RapportModel
{
    private $pdo ; 
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function getRapports()
    {
        // on récupére le contenue de la table rapport_veternaire 
        $order = isset($_GET['order']) && $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';
        // $rapport = "SELECT * FROM rapport_veterinaire  ORDER BY date $order";
        $rapport = "SELECT animal.animal_id, animal.animal_nom, rapport_veterinaire.* FROM animal
        INNER JOIN rapport_veterinaire on animal.animal_id = rapport_veterinaire.animal_id ORDER BY date $order";
        $stmt = $this->pdo->prepare($rapport);
        $stmt->execute();

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    // public function getRapportJoinAnimal($animalId,$order)
    // {   
    //     $order = isset($_GET['order']) && $_GET['order'] === 'ASC' ? 'ASC' : 'DESC';
    //     $animalId = $_GET['animal_id'];
    //     $query = "SELECT animal.animal_id, animal.animal_nom, rapport_veterinaire.* FROM animal
    //     INNER JOIN rapport_veterinaire on animal.animal_id = rapport_veterinaire.animal_id where animal.animal_id =:animal_id  ORDER BY date $order";
    //     $stmt = $this->pdo->prepare($query);
    //     $stmt->bindParam(':animal_id', $animalId, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $requests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $requests;

    // }

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
?>