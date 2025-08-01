<?php

namespace App\Models;

use App\Database;

use PDO;

class AnimalModel
{
    private $pdo;
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }
    public function getAnimals()
    {
        $animal = "SELECT * FROM  animal "; 
        $stmt = $this->pdo->prepare($animal);
        $stmt->execute();
        $animals = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $animals;
    }
    
    public function getAnimalById($animal_id)
    {
        $sql = "SELECT * FROM animal WHERE animal_id = :animal_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':animal_id', $animal_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAnimalsJoin()
    {
        $sql = "SELECT animal.animal_id, animal.animal_nom, habitat.nom AS habitat_nom, classe.nom_classe AS classe_nom FROM animal JOIN habitat ON animal.habitat_id = habitat.habitat_id
                JOIN classe ON animal.id_classe = classe.id_classe";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    
    
    public function addAnimal($animal_nom, $id_classe, $habitat_id) 
    {   
        $stmt = $this->pdo->prepare("INSERT INTO animal (animal_nom,id_classe,habitat_id) VALUES (?,?,?)");
        return $stmt->execute(array($animal_nom, $id_classe, $habitat_id));
    } 
    public function editAnimal($animal)
    {        
        $sql = "UPDATE animal SET UPDATE animal
                SET animal_nom = :animal_nom, habitat_id = :habitat_id, id_classe = :id_classe
                WHERE animal_id = :animal_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':animal_id', $animal['animal_id'], PDO::PARAM_INT);
        $stmt->bindParam(':animal_nom', $animal_nom, PDO::PARAM_STR);
        $stmt->bindParam(':habitat_id', $habitat_id, PDO::PARAM_INT);
        $stmt->bindParam(':id_classe', $id_classe, PDO::PARAM_INT);

        return $stmt->execute ();
    } 

    

    public function deleteAnimal($animal)
    {
        $req = $this->pdo->prepare("DELETE FROM animal where animal_id = :animal_id");
        $req->bindParam(':animal_id',$animal['animal_id'], PDO::PARAM_INT);
        return $req->execute();
        
    }

    public function getAnimalByName($animal_nom)
    {   
        $sql = "SELECT * FROM animal WHERE animal_nom = :animal_nom";

        $stmt = $this->pdo->prepare($sql); 
        $stmt->bindParam(':animal_nom',$animal_nom, PDO::PARAM_STR);
        $stmt->execute();
        $details = $stmt->fetch(PDO::FETCH_ASSOC);
        return $details;
    }

}

?>