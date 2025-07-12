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

    public function incrementView($animal_nom)
    {   
        $animal = $this->collection->findOne(['animal_nom' => $animal_nom]);
        if ($animal === null){
            $result = $this->collection->insertOne(
                
                ['animal_nom' => $animal_nom,
                'views'=> 1]

            );
        }else{
            
            $result = $this->collection->updateOne(
                
                ['animal_nom' => $animal_nom],
                ['$inc' => ['views' => 1]],
                ['upsert' => true]
            );
            
        }
    }

    public function getAllViews()
    {
        try {
            return $this->collection->find()->toArray();
        } catch (\Exception $e) {
            error_log("Erreur de récupération: " . $e->getMessage());
            return [];
        }
    }

}
