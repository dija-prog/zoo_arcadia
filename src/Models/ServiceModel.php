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

    public function getServiceById($service_id)
    {   
            if(isset($service_id['service_id'])){
            $stmt = $this->pdo->prepare('SELECT * FROM `service` WHERE service_id = ?');
            $stmt->execute(array($service_id['service_id']));
            $service = $stmt->fetch(PDO::FETCH_ASSOC);
            return $service;
        }
    }

    public function addService($service_nom,$description)
    {
        $query = "INSERT INTO `service`  (service_nom, `description` ) values (:service_nom,:description)";
        $query = $this->pdo->prepare($query);
        return $query->execute(array(
            ':service_nom' =>$service_nom,
            ':description'=>$description)); 
    }

    public function editService($service_id,$service_nom,$description) 
    {        
        $req = $this->pdo->prepare("UPDATE service SET service_nom = :service_nom, description = :description WHERE service_id = :service_id");

        $req->bindParam(':service_id',$service_id, PDO::PARAM_INT);
        $req->bindParam(':service_nom',$service_nom, PDO::PARAM_STR);
        $req->bindParam(':description',$description, PDO::PARAM_STR);

        $request= $req->execute();
        return $request;
        
    } 

    public function deleteService($service) 
    {
        $sql = $this->pdo->prepare("DELETE FROM `service` where service_id= :service_id");
        $sql->bindParam(':service_id', $service['id'], PDO::PARAM_INT); 
        return $sql->execute();

    }

}
?>