<?php 
namespace App\Models;
use PDOException;

require_once __DIR__ . '/../mongodb.php';

class ViewsModel {
    private $collection;
    private $mongo;

    public function __construct() {
        $db = getMongoClient();
        $this->collection = $db->animals_views; // Collection MongoDB
    }

    // Incrémentation des vues
    // public function incrementViews($animalName)
    // {  

    //     try {
    //         $this->collection->updateOne(
    //             ['animal_nom' => $animalName],
    //             ['$inc' => ['views' => 1]],
    //             ['upsert' => true]
    //         );
    //         echo "Mise à jour réussie pour $animalName.";
    //     } catch (PDOException $e) {
    //         echo "Erreur lors de l'incrémentation : " . $e->getMessage();
    //     }
    // }

    // // Récupération des vues
    // public function getAnimalViews() 
    // {
    //     try {
    //         $cursor = $this->collection->find([], ['sort' => ['views' => -1]]);
    //         $data = iterator_to_array($cursor);

    //         if (empty($data)) {
    //             return []; // Retourne un tableau vide si aucune donnée n'est trouvée
    //         }
    //         return $data;
    //     } catch (PDOException $e) {
    //         echo "Erreur lors de la récupération des données : " . $e->getMessage();
    //         return [];
    //     }

    // }

    public function incrementViews($animal_id)
    {
        $this->mongo->findOneAndUpdate(
            ['animal_id'=> $animal_id],
            ['$inc' => ['views'=> 1]],
            ['upsert' => true ]  // créer le document s'il n'existe pas 
        );
    }

    public function getAnimalStats($animal_id)
    {
        $stats = $this->mongo->findOne(['animal_id' => $animal_id]);
        return $stats ? $stats['views'] : 0;
    }

}
