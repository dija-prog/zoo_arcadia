<?php 
namespace App\Models;
use PDOException;
use App\MongoConnection;

require_once __DIR__ . '/../mongodb.php';


class ViewsModel {
    private $collection;
    public function __construct()
    {


        try {
            $db = MongoConnection::getInstance();
            $this->collection = $db->animals_views;
        } catch (\Exception $e) {
            // Gérer l'erreur
            error_log("Erreur d'initialisation de la collection: " . $e->getMessage());
            throw $e;
        }
        // $db = getMongoClient();
        // $this->collection = $db->animals_views;
        
        
    }

    public function incrementView($animal_id)
    {
        try {
            $result = $this->collection->updateOne(
                ['animal_id' => $animal_id],
                ['$inc' => ['views' => 1]],
                ['upsert' => true]
            );
            return true;
        } catch (\Exception $e) {
            error_log("Erreur d'incrémentation: " . $e->getMessage());
            return false;
        }
    }

    public function getAllViews() {
        try {
            return $this->collection->find()->toArray();
        } catch (\Exception $e) {
            error_log("Erreur de récupération: " . $e->getMessage());
            return [];
        }
    }

    // public function getAnimalStats($animal_id)
    // {
    //     $stats = $this->mongo->findOne(['animal_id' => $animal_id]);
    //     return $stats ? $stats['views'] : 0;
    // }

}
