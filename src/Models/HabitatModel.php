<?php
namespace App\Models;

use App\Database;
use PDO;

class HabitatModel
{
    private $pdo ; 
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function getHabitat()
    {
        $query = "SELECT * FROM habitat";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $habitat = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $habitat;
    }
    // public function gethabitatById($habitat_id)
    // {
    //     $sql = "SELECT habitat_id FROM habitat";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindParam("habitat_id", $habitat_id, PDO::PARAM_INT);
    //     $stmt->execute();
    //     $habitats = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }


}