<?php
namespace App\Models;

use App\Database;
use PDO;

class ServiceModel
{
    private $pdo; 
    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->getPdo();
    }

    public function getServices()
    {
        $service = "SELECT * FROM  service";
        $stmt = $this->pdo->prepare($service);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

}
?>