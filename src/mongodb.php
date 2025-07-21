<?php
require_once '../vendor/autoload.php';

if (!function_exists('getMongoClient')) {
    function getMongoClient()
    {  
        try {
            $client = new MongoDB\Client( $_ENV['MONGO']);
            return $client->zoo_arcadia;
        } catch (Exception $e) {
            echo "Erreur de connexion à MongoDB : " . $e->getMessage();
            die();
        }
    }
}
return [
    'uri' => $_ENV['MONGO'] ?? 'mongodb://localhost:27017',
    'database' => 'zoo_arcadia',
];