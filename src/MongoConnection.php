<?php 
namespace App;

use MongoDB\Client;

class MongoConnection {
    private static $instance = null;
    private static $database = null;

    public static function getInstance() {
        if (self::$instance === null) {
            $config = require __DIR__ . '/mongodb.php';
            try {
                self::$instance = new Client($_ENV['MONGO']);
                self::$instance->test->command(['ping'=>1]);
                self::$database = self::$instance->selectDatabase($config['database']);
            } catch (\Exception $e) {
                error_log("Erreur de connexion MongoDB: " . $e->getMessage());
                throw $e;
            }
        }
        return self::$database;
    }
}